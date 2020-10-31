<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fluxo extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',
        'setorOrigem',
        'setorDestino',
        'funcOrigem',
        'funcDestino',
        'status',
        'observacao'
    ];
}
