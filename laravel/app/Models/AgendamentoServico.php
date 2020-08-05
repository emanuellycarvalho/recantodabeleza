<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendamentoServico extends Model
{
    protected $table = 'tbAgendamentoServico';
    protected $fillable = ['cdAgendamento', 'cdServico', 'cdFuncionario', 'valorCobrado'];
}