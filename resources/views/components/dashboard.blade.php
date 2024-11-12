<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Card: Total de Notas Geradas -->
    <div class="bg-blue-500 text-white rounded-lg shadow-lg p-5 flex items-center">
        <div class="mr-4">
            <!-- Ícone SVG de Nota -->
            <svg class="w-12 h-12 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 0110 10 10 10 0 01-10 10A10 10 0 012 12 10 10 0 0112 2zm0 2C8.13 4 5 7.13 5 12s3.13 8 7 8 7-3.13 7-8-3.13-8-7-8zm-.5 4h1a.5.5 0 01.5.5v4.793l3.146 3.147a.5.5 0 01-.707.707l-3.5-3.5a.5.5 0 01-.146-.354V6.5a.5.5 0 01.5-.5z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Total de Notas Geradas</h3>
            <p class="text-4xl mt-1 font-bold">{{ $totalInvoices }}</p>
        </div>
    </div>

    <!-- Card: Total de Produtos Cadastrados -->
    <div class="bg-green-500 text-white rounded-lg shadow-lg p-5 flex items-center">
        <div class="mr-4">
            <!-- Ícone SVG de Produto -->
            <svg class="w-12 h-12 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 110 20 10 10 0 010-20zm0 2c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm-1 4h2v5h-2zm1 9a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Total de Produtos Cadastrados</h3>
            <p class="text-4xl mt-1 font-bold">{{ $totalProducts }}</p>
        </div>
    </div>

    <!-- Card: Total de Clientes Cadastrados -->
    <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-5 flex items-center">
        <div class="mr-4">
            <!-- Ícone SVG de Cliente -->
            <svg class="w-12 h-12 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 0110 10 10 10 0 01-10 10A10 10 0 012 12 10 10 0 0112 2zm0 2c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3zm0 6c-2.206 0-4 1.794-4 4v1a1 1 0 001 1h6a1 1 0 001-1v-1c0-2.206-1.794-4-4-4z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Total de Clientes Cadastrados</h3>
            <p class="text-4xl mt-1 font-bold">{{ $totalClients }}</p>
        </div>
    </div>

    <!-- Card: Total de Vendas Realizadas -->
    <div class="bg-purple-500 text-white rounded-lg shadow-lg p-5 flex items-center">
        <div class="mr-4">
            <!-- Ícone SVG de Vendas -->
            <svg class="w-12 h-12 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M10 2C4.48 2 0 6.48 0 12s4.48 10 10 10 10-4.48 10-10S15.52 2 10 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-.5-4h1v-5h-1zm.5-7c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1-.45-1-1-1z"/>
            </svg>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Total de Vendas Realizadas</h3>
            <p class="text-4xl mt-1 font-bold">{{ $totalSales }}</p>
        </div>
    </div>
</div>
