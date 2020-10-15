<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioServico extends Model
{
    protected $table = 'tbFuncionarioServico';
    protected $fillable = ['cdServico', 'cdFuncionario'];
}
