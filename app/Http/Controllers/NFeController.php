<?php

namespace App\Http\Controllers;

use App\Models\NFe;
use App\Services\NFeService;
use Illuminate\Http\Request;

class NFeController extends Controller
{
    protected $nfeService;

    public function __construct(NFeService $nfeService)
    {
        // $this->nfeService = $nfeService;
    }

    public function index()
    {
        $nfes = NFe::all();
        return view('nfe.index', compact('nfes'));
    }

    public function show($id)
    {
        $nfe = NFe::findOrFail($id);
        return view('nfe.show', compact('nfe'));
    }

    public function editXml()
    {
        $filePath = storage_path('app/private/Xml/NFe.xml'); // Path to your XML file
        
        if (!file_exists($filePath)) {
            return back()->with('error', 'XML file not found');
        }
        
        $xml = simplexml_load_file($filePath);
        $data = [
            // ide section
            'cUF' => (string) $xml->infNFe->ide->cUF,
            'cNF' => (string) $xml->infNFe->ide->cNF,
            'natOp' => (string) $xml->infNFe->ide->natOp,
            'indPag' => (string) $xml->infNFe->ide->indPag,
            'mod' => (string) $xml->infNFe->ide->mod,
            'serie' => (string) $xml->infNFe->ide->serie,
            'nNF' => (string) $xml->infNFe->ide->nNF,
            'dhEmi' => (string) $xml->infNFe->ide->dhEmi,
            'dhSaiEnt' => (string) $xml->infNFe->ide->dhSaiEnt,
            'tpNF' => (string) $xml->infNFe->ide->tpNF,
            'idDest' => (string) $xml->infNFe->ide->idDest,
            'cMunFG' => (string) $xml->infNFe->ide->cMunFG,
            'tpImp' => (string) $xml->infNFe->ide->tpImp,
            'tpEmis' => (string) $xml->infNFe->ide->tpEmis,
            'cDV' => (string) $xml->infNFe->ide->cDV,
            'tpAmb' => (string) $xml->infNFe->ide->tpAmb,
            'finNFe' => (string) $xml->infNFe->ide->finNFe,
            'indFinal' => (string) $xml->infNFe->ide->indFinal,
            'indPres' => (string) $xml->infNFe->ide->indPres,
            'procEmi' => (string) $xml->infNFe->ide->procEmi,
            'verProc' => (string) $xml->infNFe->ide->verProc,

            // emit section
            'emitCNPJ' => (string) $xml->infNFe->emit->CNPJ,
            'emitNome' => (string) $xml->infNFe->emit->xNome,
            'emitLgr' => (string) $xml->infNFe->emit->enderEmit->xLgr,
            'emitNro' => (string) $xml->infNFe->emit->enderEmit->nro,
            'emitBairro' => (string) $xml->infNFe->emit->enderEmit->xBairro,
            'emitCMun' => (string) $xml->infNFe->emit->enderEmit->cMun,
            'emitXMun' => (string) $xml->infNFe->emit->enderEmit->xMun,
            'emitUF' => (string) $xml->infNFe->emit->enderEmit->UF,
            'emitCEP' => (string) $xml->infNFe->emit->enderEmit->CEP,
            'emitCPais' => (string) $xml->infNFe->emit->enderEmit->cPais,
            'emitXPais' => (string) $xml->infNFe->emit->enderEmit->xPais,
            'emitIE' => (string) $xml->infNFe->emit->IE,
            'emitCRT' => (string) $xml->infNFe->emit->CRT,

            // dest section
            'destCNPJ' => (string) $xml->infNFe->dest->CNPJ,
            'destNome' => (string) $xml->infNFe->dest->xNome,
            'destLgr' => (string) $xml->infNFe->dest->enderDest->xLgr,
            'destNro' => (string) $xml->infNFe->dest->enderDest->nro,
            'destBairro' => (string) $xml->infNFe->dest->enderDest->xBairro,
            'destCMun' => (string) $xml->infNFe->dest->enderDest->cMun,
            'destXMun' => (string) $xml->infNFe->dest->enderDest->xMun,
            'destUF' => (string) $xml->infNFe->dest->enderDest->UF,
            'destCEP' => (string) $xml->infNFe->dest->enderDest->CEP,
            'destCPais' => (string) $xml->infNFe->dest->enderDest->cPais,
            'destXPais' => (string) $xml->infNFe->dest->enderDest->xPais,
            'destIndIEDest' => (string) $xml->infNFe->dest->indIEDest,
            'destIE' => (string) $xml->infNFe->dest->IE,

            // det section for product details
            'prodCProd' => (string) $xml->infNFe->det->prod->cProd,
            'prodXProd' => (string) $xml->infNFe->det->prod->xProd,
            'prodNCM' => (string) $xml->infNFe->det->prod->NCM,
            'prodCFOP' => (string) $xml->infNFe->det->prod->CFOP,
            'prodUCom' => (string) $xml->infNFe->det->prod->uCom,
            'prodQCom' => (string) $xml->infNFe->det->prod->qCom,
            'prodVUnCom' => (string) $xml->infNFe->det->prod->vUnCom,
            'prodVProd' => (string) $xml->infNFe->det->prod->vProd,

            // total section for ICMS totals
            'vBC' => (string) $xml->infNFe->total->ICMSTot->vBC,
            'vICMS' => (string) $xml->infNFe->total->ICMSTot->vICMS,
            'vProd' => (string) $xml->infNFe->total->ICMSTot->vProd,
            'vNF' => (string) $xml->infNFe->total->ICMSTot->vNF,
        ];
        
        return view('nfe.edit', compact('data'));
    }

    public function updateXml(Request $request)
    {
        // Load the XML file
        $filePath = storage_path('app/private/Xml/NFe.xml'); // Path to your XML file
        
        if (!file_exists($filePath)) {
            return back()->with('error', 'XML file not found');
        }

        $xml = simplexml_load_file($filePath);

        // Modify the <ide> section
        $xml->infNFe->ide->cUF = $request->input('cUF', '35');
        $xml->infNFe->ide->cNF = $request->input('cNF', '80070008');
        $xml->infNFe->ide->natOp = $request->input('natOp', 'VENDA');
        $xml->infNFe->ide->indPag = $request->input('indPag', '0');
        $xml->infNFe->ide->mod = $request->input('mod', '55');
        $xml->infNFe->ide->serie = $request->input('serie', '1');
        $xml->infNFe->ide->nNF = $request->input('nNF', '2');
        $xml->infNFe->ide->dhEmi = $request->input('dhEmi', date('c'));
        $xml->infNFe->ide->dhSaiEnt = $request->input('dhSaiEnt', date('c'));
        $xml->infNFe->ide->tpNF = $request->input('tpNF', '1');
        $xml->infNFe->ide->idDest = $request->input('idDest', '1');
        $xml->infNFe->ide->cMunFG = $request->input('cMunFG', '3518800');
        $xml->infNFe->ide->tpImp = $request->input('tpImp', '1');
        $xml->infNFe->ide->tpEmis = $request->input('tpEmis', '1');
        $xml->infNFe->ide->cDV = $request->input('cDV', '8');
        $xml->infNFe->ide->tpAmb = $request->input('tpAmb', '2');
        $xml->infNFe->ide->finNFe = $request->input('finNFe', '1');
        $xml->infNFe->ide->indFinal = $request->input('indFinal', '0');
        $xml->infNFe->ide->indPres = $request->input('indPres', '0');
        $xml->infNFe->ide->procEmi = $request->input('procEmi', '3.10.31');
        $xml->infNFe->ide->verProc = $request->input('verProc', '1');

        // Modify the <emit> section
        $xml->infNFe->emit->CNPJ = $request->input('emitCNPJ', '78767865000156');
        $xml->infNFe->emit->xNome = $request->input('emitNome', 'Empresa teste');
        $xml->infNFe->emit->enderEmit->xLgr = $request->input('emitLgr', 'Rua Teste');
        $xml->infNFe->emit->enderEmit->nro = $request->input('emitNro', '203');
        $xml->infNFe->emit->enderEmit->xBairro = $request->input('emitBairro', 'Centro');
        $xml->infNFe->emit->enderEmit->cMun = $request->input('emitCMun', '4317608');
        $xml->infNFe->emit->enderEmit->xMun = $request->input('emitXMun', 'Porto Alegre');
        $xml->infNFe->emit->enderEmit->UF = $request->input('emitUF', 'RS');
        $xml->infNFe->emit->enderEmit->CEP = $request->input('emitCEP', '955500000');
        $xml->infNFe->emit->enderEmit->cPais = $request->input('emitCPais', '1058');
        $xml->infNFe->emit->enderEmit->xPais = $request->input('emitXPais', 'BRASIL');
        $xml->infNFe->emit->IE = $request->input('emitIE', '6564344535');
        $xml->infNFe->emit->CRT = $request->input('emitCRT', '3');

        // Modify the <dest> section
        $xml->infNFe->dest->CNPJ = $request->input('destCNPJ', '78767865000156');
        $xml->infNFe->dest->xNome = $request->input('destNome', 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL');
        $xml->infNFe->dest->enderDest->xLgr = $request->input('destLgr', 'Rua Teste');
        $xml->infNFe->dest->enderDest->nro = $request->input('destNro', '203');
        $xml->infNFe->dest->enderDest->xBairro = $request->input('destBairro', 'Centro');
        $xml->infNFe->dest->enderDest->cMun = $request->input('destCMun', '4317608');
        $xml->infNFe->dest->enderDest->xMun = $request->input('destXMun', 'Porto Alegre');
        $xml->infNFe->dest->enderDest->UF = $request->input('destUF', 'RS');
        $xml->infNFe->dest->enderDest->CEP = $request->input('destCEP', '955500-000');
        $xml->infNFe->dest->enderDest->cPais = $request->input('destCPais', '1058');
        $xml->infNFe->dest->enderDest->xPais = $request->input('destXPais', 'BRASIL');
        $xml->infNFe->dest->indIEDest = $request->input('destIndIEDest', '1');
        $xml->infNFe->dest->IE = $request->input('destIE', '6564344535');

        // Modify <det> section for product details
        $xml->infNFe->det->prod->cProd = $request->input('cProd', '0001');
        $xml->infNFe->det->prod->xProd = $request->input('xProd', 'Produto teste');
        $xml->infNFe->det->prod->NCM = $request->input('NCM', '66554433');
        $xml->infNFe->det->prod->CFOP = $request->input('CFOP', '5102');
        $xml->infNFe->det->prod->uCom = $request->input('uCom', 'PÇ');
        $xml->infNFe->det->prod->qCom = $request->input('qCom', '1.0000');
        $xml->infNFe->det->prod->vUnCom = $request->input('vUnCom', '10.99');
        $xml->infNFe->det->prod->vProd = $request->input('vProd', '10.99');

        // Modify <total> section for ICMS totals
        $xml->infNFe->total->ICMSTot->vBC = $request->input('vBC', '0.20');
        $xml->infNFe->total->ICMSTot->vICMS = $request->input('vICMS', '0.04');
        $xml->infNFe->total->ICMSTot->vProd = $request->input('vProd', '10.99');
        $xml->infNFe->total->ICMSTot->vNF = $request->input('vNF', '11.03');

        // Save the modified XML back to the file
        $xml->asXML($filePath);

        return redirect()->route('nfe.index');
    }
}
