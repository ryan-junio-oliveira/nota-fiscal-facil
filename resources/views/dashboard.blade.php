<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <!-- Ícone ao lado do título -->
            <svg class="w-6 h-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 110 20 10 10 0 010-20zm0 2c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm-1 4h2v5h-2zm1 9a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/>
            </svg>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Componente Dashboard -->
                <x-dashboard />
            </div>
        </div>
    </div>
</x-app-layout>
