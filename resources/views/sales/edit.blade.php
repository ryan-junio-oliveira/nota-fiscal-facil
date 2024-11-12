<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('sales.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Editar Venda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Cliente -->
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-semibold text-gray-700">{{ __('Cliente') }}</label>
                            <select name="client_id" id="client_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Produtos e Quantidade -->
                        <div class="mb-4">
                            <label for="products" class="block text-sm font-semibold text-gray-700">{{ __('Produtos') }}</label>
                            <div class="space-y-4">
                                @foreach ($products as $product)
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                        {{ $sale->products->contains($product->id) ? 'checked' : '' }}>
                                    <span class="text-gray-700">{{ $product->name }} - R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                                    <input type="number" name="quantities[{{ $product->id }}]" min="1" value="{{ old('quantities.' . $product->id, 1) }}" class="w-16 border-gray-300 rounded-md shadow-sm">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Valor Total -->
                        <div class="mb-4">
                            <label for="total_amount" class="block text-sm font-semibold text-gray-700">{{ __('Valor Total') }}</label>
                            <input type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', $sale->total_amount) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-semibold text-gray-700">{{ __('Status') }}</label>
                            <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="pending" {{ $sale->status == 'pending' ? 'selected' : '' }}>Pendente</option>
                                <option value="completed" {{ $sale->status == 'completed' ? 'selected' : '' }}>Concluída</option>
                                <option value="cancelled" {{ $sale->status == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('sales.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                {{ __('Cancelar') }}
                            </a>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                                {{ __('Salvar Alterações') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>