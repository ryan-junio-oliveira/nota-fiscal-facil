<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <a href="{{ route('nfe.index') }}">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            {{ __('Editar Modelo NF-e') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('nfe.update') }}" method="POST">
                    @csrf

                    <!-- Ide Section -->
                    <h3 class="text-lg font-semibold mb-4">Identification (ide)</h3>
                    <div class="mb-4">
                        <label for="cUF" class="block text-gray-700">UF Code</label>
                        <input type="text" id="cUF" name="cUF" class="w-full border rounded-md p-2" value="{{ $data['cUF'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="cNF" class="block text-gray-700">NF Code</label>
                        <input type="text" id="cNF" name="cNF" class="w-full border rounded-md p-2" value="{{ $data['cNF'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="natOp" class="block text-gray-700">Operation Nature</label>
                        <input type="text" id="natOp" name="natOp" class="w-full border rounded-md p-2" value="{{ $data['natOp'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="indPag" class="block text-gray-700">Payment Indicator</label>
                        <input type="text" id="indPag" name="indPag" class="w-full border rounded-md p-2" value="{{ $data['indPag'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="mod" class="block text-gray-700">Model</label>
                        <input type="text" id="mod" name="mod" class="w-full border rounded-md p-2" value="{{ $data['mod'] ?? '55' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="nNF" class="block text-gray-700">NF-e Number</label>
                        <input type="text" id="nNF" name="nNF" class="w-full border rounded-md p-2" value="{{ $data['nNF'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="dhEmi" class="block text-gray-700">Emission Date/Time</label>
                        <input type="datetime-local" id="dhEmi" name="dhEmi" class="w-full border rounded-md p-2" value="{{ $data['dhEmi'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="dhSaiEnt" class="block text-gray-700">Exit/Entry Date/Time</label>
                        <input type="datetime-local" id="dhSaiEnt" name="dhSaiEnt" class="w-full border rounded-md p-2" value="{{ $data['dhSaiEnt'] ?? '' }}" required>
                    </div>

                    <!-- Emit Section -->
                    <h3 class="text-lg font-semibold mb-4">Emitter Information (emit)</h3>
                    <div class="mb-4">
                        <label for="emitCNPJ" class="block text-gray-700">CNPJ</label>
                        <input type="text" id="emitCNPJ" name="emitCNPJ" class="w-full border rounded-md p-2" value="{{ $data['emitCNPJ'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="emitNome" class="block text-gray-700">Name</label>
                        <input type="text" id="emitNome" name="emitNome" class="w-full border rounded-md p-2" value="{{ $data['emitNome'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="emitLgr" class="block text-gray-700">Address</label>
                        <input type="text" id="emitLgr" name="emitLgr" class="w-full border rounded-md p-2" value="{{ $data['emitLgr'] ?? '' }}" required>
                    </div>

                    <!-- Destination Section -->
                    <h3 class="text-lg font-semibold mb-4">Destination Information (dest)</h3>
                    <div class="mb-4">
                        <label for="destCNPJ" class="block text-gray-700">CNPJ</label>
                        <input type="text" id="destCNPJ" name="destCNPJ" class="w-full border rounded-md p-2" value="{{ $data['destCNPJ'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="destNome" class="block text-gray-700">Client Name</label>
                        <input type="text" id="destNome" name="destNome" class="w-full border rounded-md p-2" value="{{ $data['destNome'] ?? '' }}" required>
                    </div>

                    <!-- Product Section -->
                    <h3 class="text-lg font-semibold mb-4">Product Information (det)</h3>
                    <div class="mb-4">
                        <label for="prodCProd" class="block text-gray-700">Product Code</label>
                        <input type="text" id="prodCProd" name="prodCProd" class="w-full border rounded-md p-2" value="{{ $data['prodCProd'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="prodXProd" class="block text-gray-700">Product Name</label>
                        <input type="text" id="prodXProd" name="prodXProd" class="w-full border rounded-md p-2" value="{{ $data['prodXProd'] ?? '' }}" required>
                    </div>

                    <!-- Total Section -->
                    <h3 class="text-lg font-semibold mb-4">Total (total)</h3>
                    <div class="mb-4">
                        <label for="vProd" class="block text-gray-700">Product Total</label>
                        <input type="number" id="vProd" name="vProd" step="0.01" class="w-full border rounded-md p-2" value="{{ $data['vProd'] ?? '' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="vNF" class="block text-gray-700">Invoice Total</label>
                        <input type="number" id="vNF" name="vNF" step="0.01" class="w-full border rounded-md p-2" value="{{ $data['vNF'] ?? '' }}" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Generate NF-e</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
