<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NF-e - {{ $numero }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto my-8 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Nota Fiscal Eletrônica - NF-e</h1>

        <div class="mb-6">
            <p class="text-lg"><strong>Número:</strong> {{ $numero }}</p>
            <p class="text-lg"><strong>Data de Emissão:</strong> {{ $dataEmissao }}</p>
            <p class="text-lg"><strong>Cliente:</strong> {{ $cliente }}</p>
            <p class="text-lg"><strong>Valor Total:</strong> R$ {{ number_format($valorTotal, 2, ',', '.') }}</p>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">Produtos</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left text-gray-600 font-semibold">Código</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-semibold">Nome</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-semibold">Quantidade</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-semibold">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-700">{{ $produto['id'] }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $produto['name'] }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $produto['quantity'] }}</td>
                            <td class="py-3 px-4 text-gray-700">R$ {{ number_format($produto['price'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
