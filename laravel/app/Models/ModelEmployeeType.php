<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelEmployeeType extends Model
{
    protected $table = 'TbTipoFuncionario';
    protected $fillable = ['nmFuncao', 'salarioBase'];

    public function relEmployee(){
        return $this->hasMany('App\Models\ModelEmployee', 'cdTipoFuncionario');
    }

    public function salarioBase(){
        return number_format($this->salarioBase, 2, ',' , '.'); 
    }
}
