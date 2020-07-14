<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelClient extends Model
{
    protected $table = 'TbCliente';
    protected $fillable = ['nmCliente', 'sexo', 'dtNasc', 'cpf', 'telefone', 'email', 'senha', 'cep', 'rua', 
                            'numero', 'bairro', 'cidade', 'complemento'];

    public function relScheduling(){
        return $this->hasMany('App\Models\ModelScheduling', 'cdAgendamento', 'cdCliente');
    }
}
