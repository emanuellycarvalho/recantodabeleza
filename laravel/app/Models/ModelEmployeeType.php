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
        $salario = number_format($this->salarioBase, 2, ',' , '.');
        return str_replace('.', ' ', $salario);
    }
    
    public function whereToGo(){
        $url = explode('/', $_SERVER['HTTP_REFERER']);
        $length = count($url);
        if ($url[$length - 1] == 'create' && $url[$length - 2] == 'employee'){
            return $_SERVER['HTTP_REFERER'];
        }
        return 'adm/employeeType';   
    }
}
