<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fluxo extends Model
{
    use HasFactory;
    protected $table = 'fluxos';
    protected $fillable = [
        'documentoId',
        'setorOrigem',
        'setorDestino',
        'funcOrigem',
        'funcDestino',
        'status',
        'observacao'
    ];
    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documentoId', 'id');
    }



}
