<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lojas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'marca',
        'cnpj',
        'razao',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'regiao',
        'telefone',
        'email',
        'latitude',
        'longitude',
    ];
}
