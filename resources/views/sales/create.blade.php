<!-- resources/views/sales/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('sales.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Registrar Venda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('sales.store') }}">
                    @csrf

                    <!-- Selecionar Cliente -->
                    <div class="mb-4">
                        <label for="client_id" class="block text-gray-700">{{ __('Cliente') }}</label>
                        <select name="client_id" id="client_id" class="w-full p-2 border rounded-md">
                            <option value="" disabled selected>Selecione um cliente</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Selecionar Produtos -->
                    <div class="mb-4">
                        <label for="products" class="block text-gray-700">{{ __('Produtos') }}</label>
                        <div id="product-list">
                            <div class="mb-2">
                                <select name="products[0][id]" class="product-select w-full p-2 border rounded-md" required>
                                    <option value="" disabled selected>Selecione um produto</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} - R$ {{ number_format($product->price, 2, ',', '.') }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="products[0][quantity]" placeholder="Quantidade" class="w-full p-2 border rounded-md mt-2" required>
                            </div>
                        </div>
                        <button type="button" id="add-product" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Adicionar Produto</button>
                    </div>

                    <!-- Botão de Submissão -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Registrar Venda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-product').addEventListener('click', function() {
            const productCount = document.querySelectorAll('.product-select').length;
            const newProductDiv = document.createElement('div');
            newProductDiv.classList.add('mb-2');
            newProductDiv.classList.add('product-item');
            newProductDiv.innerHTML = `
        <select name="products[${productCount}][id]" class="product-select w-full p-2 border rounded-md" required>
            <option value="" disabled selected>Selecione um produto</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} - R$ {{ number_format($product->price, 2, ',', '.') }}</option>
            @endforeach
        </select>
        <input type="number" name="products[${productCount}][quantity]" placeholder="Quantidade" class="w-full p-2 border rounded-md mt-2" required>
        <button type="button" class="remove-product mt-2 p-2 bg-red-500 text-white rounded-md">Remover</button>
    `;

            // Adiciona o novo produto à lista de produtos
            const productList = document.getElementById('product-list');
            productList.appendChild(newProductDiv);

            // Adiciona o evento de remoção do produto
            newProductDiv.querySelector('.remove-product').addEventListener('click', function() {
                newProductDiv.remove();
            });
        });
    </script>
</x-app-layout>