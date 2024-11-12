<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);  // Exemplo de paginação com 10 clientes por página
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|max:20|unique:clients',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Client::create([
            'name' => $request->name,
            'cpf_cnpj' => $request->cpf_cnpj,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id); // Encontra o cliente pelo ID

        return view('clients.show', compact('client')); // Passa o cliente para a view
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id); // Busca o cliente pelo ID

        return view('clients.edit', compact('client')); // Passa o cliente para a view de edição
    }

    public function update(Request $request, $id)
    {
        // Validação dos campos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|max:20|unique:clients,cpf_cnpj,' . $id,
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Encontra o cliente pelo ID e atualiza os dados
        $client = Client::findOrFail($id);
        $client->update($validated);

        // Redireciona para a página de detalhes com uma mensagem de sucesso
        return redirect()->route('clients.show', $client->id)->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id); // Encontra o cliente pelo ID

        $client->delete(); // Exclui o cliente

        // Redireciona para a lista de clientes com uma mensagem de sucesso
        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
