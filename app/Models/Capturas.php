<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capturas extends Model
{
    use HasFactory;
    protected $fillable = [
        'loja',
        'host',
        'ip',
        'datahora',
        'marca',
        'up',
        'down',
    ];
}
