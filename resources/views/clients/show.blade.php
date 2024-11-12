<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('clients.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Detalhes do Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Exibição dos Dados do Cliente -->
                    <div class="space-y-4 mb-8">
                        <div class="text-lg font-semibold">{{ __('Nome') }}:</div>
                        <div class="text-xl text-gray-700">{{ $client->name }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('CPF/CNPJ') }}:</div>
                        <div class="text-gray-700">{{ $client->cpf_cnpj }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('Endereço') }}:</div>
                        <div class="text-gray-700">{{ $client->address ?? __('Não informado') }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('E-mail') }}:</div>
                        <div class="text-gray-700">{{ $client->email ?? __('Não informado') }}</div>

                        <div class="text-lg font-semibold mt-4">{{ __('Telefone') }}:</div>
                        <div class="text-gray-700">{{ $client->phone ?? __('Não informado') }}</div>
                    </div>

                    <!-- Ações -->
                    <div class="mt-6 flex justify-start space-x-4">
                        <a href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-200 ease-in-out transform hover:scale-105">
                            {{ __('Editar Cliente') }}
                        </a>

                        <form method="POST" action="{{ route('clients.destroy', $client->id) }}" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200 ease-in-out transform hover:scale-105">
                                {{ __('Excluir Cliente') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
