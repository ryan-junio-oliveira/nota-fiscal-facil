<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);  // Paginação com 10 produtos por página
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Encontra o produto pelo ID

        return view('products.show', compact('product')); // Passa o produto para a view
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id); // Busca o produto pelo ID

        return view('products.edit', compact('product')); // Passa o produto para a view de edição
    }

    public function update(Request $request, $id)
    {
        // Validação dos campos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Encontra o produto pelo ID e atualiza os dados
        $product = Product::findOrFail($id);
        $product->update($validated);

        // Redireciona para a página de detalhes com uma mensagem de sucesso
        return redirect()->route('products.show', $product->id)->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id); // Encontra o produto pelo ID

        $product->delete(); // Exclui o produto

        // Redireciona para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
