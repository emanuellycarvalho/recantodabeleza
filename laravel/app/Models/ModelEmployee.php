<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelEmployee extends Model
{
    protected $table = 'TbFuncionario';
    protected $fillable = ['nmFuncionario', 'sexo', 'dtNasc', 'cpf', 'telefone',  'email', 'senha', 'cep',
                        'rua', 'numero', 'bairro', 'cidade', 'complemento', 'cdTipoFuncionario'];

    public function relEmployeeType(){
        return $this->belongsTo('App\Models\ModelEmployeeType', 'cdTipoFuncionario', 'cdTipoFuncionario');
    } 

    public function relEmployee(){
        return $this->hasMany('App\Models\ModelScheduling', 'cdFuncionario', 'cdFuncionario');
    }

    public function relService() {
        return $this->belongsToMany('App\Models\ModelService', 'tbFuncionarioServico', 'cdFuncionario', 'cdServico')
                    ->withTimestamps();
    }

    public function dtNasc(){
        if ($this->dtNasc != NULL){
            $dtNasc = explode( '-' , $this->dtNasc);
            $dtNasc = $dtNasc[2] . '/' . $dtNasc[1] . '/' . $dtNasc[0];
            return $dtNasc;
        }

        return "";
    }

    public function verifyEmail($email){
        $found = null;
        if ($email != null){
            $found = $this->find('email', '{$email}')->first();
        }
        return $found;
    }
}

?>
