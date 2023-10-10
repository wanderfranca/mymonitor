<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    protected $fillable = [
        'loja',
        'host',
        'ip',
        'down',
        'up',
        'datahora',
        'marca',
    ];
}
