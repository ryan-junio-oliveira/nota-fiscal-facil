<?php

// app/Http/Controllers/SaleController.php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Calcular o total da venda
        $totalAmount = 0;
        foreach ($request->products as $product) {
            $prod = Product::find($product['id']);
            $totalAmount += $prod->price * $product['quantity'];
        }

        // Criar a venda
        $sale = Sale::create([
            'client_id' => $request->client_id,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        // Adicionar os produtos à venda e dar baixa no estoque
        foreach ($request->products as $product) {
            $prod = Product::find($product['id']);
            $prod->decrement('stock', $product['quantity']); // Atualizar o estoque

            $sale->products()->attach($prod, [
                'quantity' => $product['quantity'],
                'price' => $prod->price,
            ]);
        }

        // Gerar a nota fiscal (simulada por enquanto)
        // Aqui você pode integrar um sistema de geração de NF-e, se necessário.

        return redirect()->route('sales.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function index()
    {
        $sales = Sale::with('client')->paginate(10); // Paginação com relacionamento 'client'
        return view('sales.index', compact('sales'));
    }

    public function show($id)
    {
        // Encontra a venda pelo ID e carrega os produtos relacionados
        $sale = Sale::with('client', 'products')->findOrFail($id);

        // Retorna a view com os dados da venda
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        // Encontra a venda pelo ID
        $sale = Sale::findOrFail($id);

        // Obtém todos os clientes e produtos para preencher os campos do formulário
        $clients = Client::all();
        $products = Product::all();

        // Retorna a view de edição com os dados da venda, clientes e produtos
        return view('sales.edit', compact('sale', 'clients', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos no formulário
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pendente,completa,cancelled',
        ]);

        // Encontra a venda a ser atualizada
        $sale = Sale::findOrFail($id);

        // Atualiza os dados da venda
        $sale->client_id = $request->input('client_id');
        $sale->total_amount = $request->input('total_amount');
        $sale->status = $request->input('status');
        $sale->save();

        // Atualiza os produtos relacionados à venda
        $sale->products()->sync([]);

        foreach ($request->input('products') as $productId) {
            $quantity = $request->input("quantities.{$productId}");
            $price = Product::find($productId)->price;

            // Adiciona os produtos à venda com as quantidades e preços
            $sale->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $price
            ]);
        }

        // Redireciona para a lista de vendas com uma mensagem de sucesso
        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso.');
    }

    // app/Http/Controllers/SaleController.php

    public function destroy($id)
    {
        // Encontra a venda a ser excluída
        $sale = Sale::findOrFail($id);

        // Exclui a venda e seus relacionamentos com os produtos
        $sale->products()->detach();  // Remove os produtos relacionados
        $sale->delete();  // Exclui a venda

        // Redireciona para a lista de vendas com uma mensagem de sucesso
        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso.');
    }
}
