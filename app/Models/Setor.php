<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
protected $table = 'setores';
    protected $fillable = [
        'sigla',
        'descricao'

    ];

    public function empresas(){

       return $this->belongsToMany(Empresa::class,'empresas_setores','setorId','empresaId');

    }
    public function funcionarios(){

        return $this->belongsToMany(Funcionario::class,'setores_funcionarios','setorId','funcionarioId');

     }
}
