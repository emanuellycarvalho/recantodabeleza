<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelService extends Model
{
    protected $table='TbServico';
    protected $fillable=['cdServico','descricao','valorServico','comissao'];
}
