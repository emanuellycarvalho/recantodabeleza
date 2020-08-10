<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    protected $table='TbProduto';
    protected $fillable=['cdProduto','nmProduto','marca','descricao','qtd','precoProduto','comissao','foto'];
}
