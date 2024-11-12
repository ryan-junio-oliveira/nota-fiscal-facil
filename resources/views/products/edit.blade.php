<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <!-- Ícone ao lado do título -->
            <a href="{{ route('clients.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Edição de Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-gray-700">{{ __('Nome do Produto') }}</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-gray-700">{{ __('Descrição') }}</label>
                            <input type="text" id="description" name="description" class="mt-1 block w-full" value="{{ old('description', $product->description) }}">
                        </div>

                        <div>
                            <label for="price" class="block font-medium text-gray-700">{{ __('Preço') }}</label>
                            <input type="number" id="price" name="price" class="mt-1 block w-full" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div>
                            <label for="stock" class="block font-medium text-gray-700">{{ __('Estoque') }}</label>
                            <input type="number" id="stock" name="stock" class="mt-1 block w-full" value="{{ old('stock', $product->stock) }}" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                            {{ __('Atualizar Produto') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
