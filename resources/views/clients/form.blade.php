<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <!-- Ícone ao lado do título -->
            <a href="{{route('clients.index')}}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Cadastro de Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-gray-700">{{ __('Nome do Cliente') }}</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full" value="{{ old('name') }}" placeholder="Digite o nome completo do cliente" required>
                        </div>

                        <div>
                            <label for="cpf_cnpj" class="block font-medium text-gray-700">{{ __('CPF ou CNPJ') }}</label>
                            <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="mt-1 block w-full" value="{{ old('cpf_cnpj') }}" placeholder="Digite o CPF ou CNPJ" required>
                        </div>

                        <div>
                            <label for="address" class="block font-medium text-gray-700">{{ __('Endereço') }}</label>
                            <input type="text" id="address" name="address" class="mt-1 block w-full" value="{{ old('address') }}" placeholder="Digite o endereço do cliente">
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-gray-700">{{ __('E-mail') }}</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full" value="{{ old('email') }}" placeholder="Digite o e-mail do cliente">
                        </div>

                        <div>
                            <label for="phone" class="block font-medium text-gray-700">{{ __('Telefone') }}</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full" value="{{ old('phone') }}" placeholder="Digite o telefone do cliente">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            {{ __('Cadastrar Cliente') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
