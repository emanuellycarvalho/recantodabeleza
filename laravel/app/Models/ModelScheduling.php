<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelScheduling extends Model
{
    protected $table = 'TbAgendamento';
    protected $fillable = ['dtAgendamento', 'inicio', 'fim', 'valorTotal', 'cdCliente', 'cdFuncionario'];

    public function relClient(){
        return $this->hasOne('App\Models\ModelClient', 'cdCliente', 'cdAgendamento');
    }

    public function relEmployee(){
        return $this->hasOne('App\Models\ModelClient', 'cdFuncionario', 'cdAgendamento');
    }
}
