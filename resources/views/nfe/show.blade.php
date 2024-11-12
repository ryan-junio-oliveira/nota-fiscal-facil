<!-- resources/views/nfe/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('nfe.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('NF-e Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-700"><strong>Numero:</strong> {{ $nfe->numero }}</p>
                <p class="text-gray-700"><strong>Data Emissão:</strong> {{ $nfe->data_emissao }}</p>
                <p class="text-gray-700"><strong>cliente:</strong> {{ $nfe->cliente }}</p>
                <p class="text-gray-700"><strong>Valor Total:</strong> R$ {{ number_format($nfe->valor_total, 2, ',', '.') }}</p>
                <div class="mt-4">
                    <p class="text-gray-700"><strong>XML Content:</strong></p>
                    <pre class="bg-gray-100 p-4 rounded-md overflow-auto text-sm text-gray-600">{{ $nfe->xml_content }}</pre>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
