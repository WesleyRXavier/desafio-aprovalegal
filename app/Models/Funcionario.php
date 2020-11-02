<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'cpf'
    ];

    public function setores(){

        return $this->belongsToMany(Setor::class,'setores_funcionarios','funcionarioId', 'setorId');

     }
}
