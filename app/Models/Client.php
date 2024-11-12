<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'cpf_cnpj',
        'address',
        'email',
        'phone'
    ];
}
