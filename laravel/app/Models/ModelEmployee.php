<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelEmployee extends Model
{
    protected $table = 'TbFuncionario';
    protected $fillable = ['nmFornecedor', 'sexo', 'dtNasc', 'cpf', 'telefone',  'email', 'senha', 
                        'rua', 'numero', 'bairro', 'cidade', 'complemento', 'cdTipoFuncionario'];

    public function relEmployeeType(){
        return $this->hasOne('App\Models\ModelEmployeeType', 'cdFuncionario', 'cdTipoFuncionario');
    }
}

?>
