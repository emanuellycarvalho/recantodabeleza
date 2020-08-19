<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelService extends Model
{
    protected $table='TbServico';
    protected $fillable=['descricao', 'nmServico', 'valorServico','comissao'];
    
    public function relScheduling(){
        return $this->belongsToMany('App\Models\ModelScheduling', 'tbAgendamentoServico', 'cdServico', 'cdAgendamento')
        ->as('agendamentos')
        ->withPivot('CdFuncionario', 'valorCobrado')
        ->withTimestamps(); 
    }
}
