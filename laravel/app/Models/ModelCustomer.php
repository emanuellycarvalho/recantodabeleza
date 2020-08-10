<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCustomer extends Model
{
    protected $table='TbCliente';
    protected $fillable= ['nmCliente', 'sexo', 'telefone', 'dtNasc', 'email', 'senha', 'rua', 'numero', 'complemento', 'bairro', 'cep', 'rg', 'cidade', 'foto'];

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