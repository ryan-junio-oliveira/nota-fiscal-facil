<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('dashboard') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Vendas Registradas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Lista de Vendas</h3>
                    <a href="{{ route('sales.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Registrar Venda</a>
                </div>

                <!-- Tabela de Vendas -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Cliente</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Valor Total</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $sale->client->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">R$ {{ number_format($sale->total_amount, 2, ',', '.') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ ucfirst($sale->status) }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700 flex space-x-2">
                                        <a href="{{ route('sales.show', $sale->id) }}" class="text-blue-500 hover:text-blue-700">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="mt-4">
                    {{ $sales->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
