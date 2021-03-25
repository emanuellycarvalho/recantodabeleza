<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoServico extends Model
{
    protected $table = 'tbAtendimentoServico';
    protected $fillable = ['cdAtendimento', 'cdServico', 'cdFuncionario', 'valorCobrado'];
}
