<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{route('products.index')}}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Detalhes do Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Detalhes do Produto -->
                    <div class="space-y-4 mb-8">
                        <div class="text-lg font-semibold">{{ __('Nome') }}:</div>
                        <div class="text-xl text-gray-700">{{ $product->name }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('Descrição') }}:</div>
                        <div class="text-gray-700">{{ $product->description ?? __('Sem descrição disponível') }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('Preço') }}:</div>
                        <div class="text-xl font-semibold text-gray-800">R$ {{ number_format($product->price, 2, ',', '.') }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('Estoque') }}:</div>
                        <div class="text-xl text-gray-700">{{ $product->stock }}</div>
                    </div>

                    <!-- Ações -->
                    <div class="mt-6 flex justify-start space-x-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-200 ease-in-out transform hover:scale-105">
                            {{ __('Editar Produto') }}
                        </a>

                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200 ease-in-out transform hover:scale-105">
                                {{ __('Excluir Produto') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>