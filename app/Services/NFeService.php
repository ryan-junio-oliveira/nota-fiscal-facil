<?php

namespace App\Services;

use SimpleXMLElement;
use Illuminate\Support\Facades\Http;

class NFeService
{
    public function generateXml(array $nfeData)
    {
        $xml = new SimpleXMLElement('<NFe/>');
        
        // Informação de identificação
        $infNFe = $xml->addChild('infNFe');
        $ide = $infNFe->addChild('ide');
        $ide->addChild('cUF', '35'); // Exemplo para São Paulo
        $ide->addChild('natOp', 'Venda');
        $ide->addChild('mod', '55');
        $ide->addChild('nNF', $nfeData['numero']);
        $ide->addChild('dhEmi', now()->format('Y-m-d\TH:i:sP'));

        // Dados do cliente
        $emit = $infNFe->addChild('emit');
        $emit->addChild('CNPJ', '12345678000123'); // Exemplo de CNPJ
        $emit->addChild('xNome', $nfeData['cliente']);
        
        // Produtos
        foreach ($nfeData['produtos'] as $produto) {
            $det = $infNFe->addChild('det');
            $prod = $det->addChild('prod');
            $prod->addChild('cProd', $produto['id']);
            $prod->addChild('xProd', $produto['name']);
            $prod->addChild('vUnCom', $produto['price']);
            $prod->addChild('qCom', $produto['quantity']);
        }

        // Totais
        $total = $infNFe->addChild('total');
        $total->addChild('vProd', $nfeData['valorTotal']);

        return $xml->asXML();
    }

    public function sendToSefaz(string $xmlContent)
    {
        // Enviar XML para SEFAZ usando um endpoint de exemplo
        // $response = Http::post('https://sefaz.gov.br/api/sendNFe', [
        //     'xml' => $xmlContent
        // ]);

        // // Verificar e retornar resposta da SEFAZ
        // return $response->successful() ? $response->body() : 'Erro ao enviar NF-e';

        return 'successo ao gerar xml';
    }
}
