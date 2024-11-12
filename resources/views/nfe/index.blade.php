<!-- resources/views/nfe/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('dashboard') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('NF-e Lista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Button to Edit Default Model -->
                <div class="mb-4">
                    <a href="{{ route('nfe.editXml') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Editar modelo padrão
                    </a>
                </div>

                <!-- NF-e Table -->
                <table class="min-w-full bg-white border border-gray-200 rounded-md">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Numero</th>
                            <th class="py-3 px-6 text-left">Date Emissao</th>
                            <th class="py-3 px-6 text-left">Cliente</th>
                            <th class="py-3 px-6 text-left">Valor Total</th>
                            <th class="py-3 px-6 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($nfes as $nfe)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $nfe->numero }}</td>
                                <td class="py-3 px-6">{{ $nfe->data_emissao }}</td>
                                <td class="py-3 px-6">{{ $nfe->cliente }}</td>
                                <td class="py-3 px-6">R$ {{ number_format($nfe->valor_total, 2, ',', '.') }}</td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('nfe.show', $nfe->id) }}" class="text-blue-500 hover:text-blue-700">Detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
