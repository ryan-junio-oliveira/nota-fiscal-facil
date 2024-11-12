<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NFe extends Model
{
    protected $table = 'nfes';

    protected $fillable = [
        'numero',
        'data_emissao',
        'cliente',
        'valor_total',
        'xml_content',
        'sefaz_response',
    ];
}
