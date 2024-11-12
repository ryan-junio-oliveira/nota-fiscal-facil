<?php

// app/Http/Controllers/SaleController.php

namespace App\Http\Controllers;

use App\Models\NFe;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Services\NFeService;
use App\Services\PDFService;
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
        // Validate form data
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        // Find and update the sale
        $sale = Sale::findOrFail($id);
        $sale->client_id = $request->input('client_id');
        $sale->total_amount = $request->input('total_amount');
        $sale->status = $request->input('status');
        $sale->save();

        // Update sale products
        $sale->products()->sync([]);
        foreach ($request->input('products') as $productId) {
            $quantity = $request->input("quantities.{$productId}");
            $price = Product::find($productId)->price;

            // Attach products to sale with quantity and price
            $sale->products()->attach($productId, [
                'quantity' => $quantity,
                'price' => $price
            ]);
        }

        // Generate and save NF-e if status is "completed"
        if ($sale->status === 'completed') {
            // Gather sale details for NF-e
            $nfeData = [
                'numero' => $sale->id,
                'dataEmissao' => now()->format('Y-m-d'),
                'cliente' => $sale->client->name,
                'valorTotal' => $sale->total_amount,
                'produtos' => $sale->products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'quantity' => $product->pivot->quantity,
                    ];
                })->toArray(),
            ];

            // Generate XML for NF-e
            $nfeService = new NFeService();
            $xmlContent = $nfeService->generateXml($nfeData);
            $response = $nfeService->sendToSefaz($xmlContent);

            // Save NF-e record in database
            $nfe = NFe::create([
                'numero' => $nfeData['numero'],
                'data_emissao' => $nfeData['dataEmissao'],
                'cliente' => $nfeData['cliente'],
                'valor_total' => $nfeData['valorTotal'],
                'xml_content' => $xmlContent,
                'sefaz_response' => $response,
            ]);

            // Generate PDF from XML and offer download
            $pdfService = new PDFService();
            $pdfContent = $pdfService->generateFromXml($xmlContent);
            $pdfPath = storage_path("app/public/nfe_{$nfe->numero}.pdf");
            file_put_contents($pdfPath, $pdfContent);

            return response()->download($pdfPath, "NF-e_{$nfe->numero}.pdf");
        }

        // Redirect with success message
        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso.');
    }

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
