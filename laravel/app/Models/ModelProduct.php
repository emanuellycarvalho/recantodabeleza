<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    protected $table='TbProduto';
    protected $fillable=['nmProduto','marca','descricao','qtd','precoProduto','comissao','foto'];

    public function relSupplier() {
        return $this->belongsToMany('App\Models\ModelSupplier', 'tbFornecedorProduto', 'cdProduto', 'cdFornecedor')
        ->as('produtos')
        ->withPivot('cdFornecedor')
        ->withTimestamps();
    }

}
