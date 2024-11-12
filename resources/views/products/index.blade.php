<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{route('dashboard')}}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold">{{ __('Lista de Produtos') }}</h3>
                        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">{{ __('Cadastrar Novo Produto') }}</a>
                    </div>

                    <!-- Tabela de Produtos -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">{{ __('Nome') }}</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">{{ __('Preço') }}</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">{{ __('Estoque') }}</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">{{ __('Ações') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $product->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $product->stock }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 flex space-x-2">
                                        <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:text-blue-700">{{ __('Ver') }}</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-700">{{ __('Editar') }}</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Excluir') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginação -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>