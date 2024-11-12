<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('clients.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Formulário de Edição -->
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4 mb-8">
                            <!-- Nome -->
                            <div>
                                <label class="text-lg font-semibold" for="name">{{ __('Nome') }}:</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $client->name) }}" required>
                            </div>

                            <!-- CPF/CNPJ -->
                            <div>
                                <label class="text-lg font-semibold" for="cpf_cnpj">{{ __('CPF/CNPJ') }}:</label>
                                <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('cpf_cnpj', $client->cpf_cnpj) }}" required>
                            </div>

                            <!-- Endereço -->
                            <div>
                                <label class="text-lg font-semibold" for="address">{{ __('Endereço') }}:</label>
                                <input type="text" name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address', $client->address) }}">
                            </div>

                            <!-- E-mail -->
                            <div>
                                <label class="text-lg font-semibold" for="email">{{ __('E-mail') }}:</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $client->email) }}">
                            </div>

                            <!-- Telefone -->
                            <div>
                                <label class="text-lg font-semibold" for="phone">{{ __('Telefone') }}:</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('phone', $client->phone) }}">
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-200 ease-in-out transform hover:scale-105">
                                {{ __('Atualizar Cliente') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
