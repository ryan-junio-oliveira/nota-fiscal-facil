<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFService
{
    public function generateFromXml(string $xmlContent)
    {
        // Carregar XML para extração de dados
        $xml = simplexml_load_string($xmlContent);

        // Definir dados para a visualização do PDF
        $data = [
            'numero' => (string) $xml->infNFe->ide->nNF,
            'dataEmissao' => (string) $xml->infNFe->ide->dhEmi,
            'cliente' => (string) $xml->infNFe->emit->xNome,
            'valorTotal' => (string) $xml->infNFe->total->vProd,
            'produtos' => collect($xml->infNFe->det)->map(function ($det) {
                return [
                    'id' => (string) $det->prod->cProd,
                    'name' => (string) $det->prod->xProd,
                    'price' => (string) $det->prod->vUnCom,
                    'quantity' => (string) $det->prod->qCom,
                ];
            })->toArray(),
        ];

        // Renderizar PDF a partir de uma view
        $pdf = Pdf::loadView('nfe.pdf', $data);
        return $pdf->output();
    }
}
