<?php

namespace App\Http\Controllers;

use App\Models\NFe;
use Illuminate\Http\Request;

class NFeController extends Controller
{
    public function index()
    {
        $nfes = NFe::all();
        return view('nfe.index', compact('nfes'));
    }

    public function create()
    {
        return view('nfe.form');
    }

    public function store(Request $request)
    {
        // Código para salvar NF-e
    }

    public function show($id)
    {
        $nfe = NFe::findOrFail($id);
        return view('nfe.show', compact('nfe'));
    }
}
