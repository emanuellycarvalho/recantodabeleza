<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSupplier extends Model
{
    protected $table = 'TbFornecedor';
    protected $fillable = ['nmFornecedor', 'cnpj', 'email', 'telefone'];

    public function relProduct() {
        return $this->belongsToMany('App\Models\ModelProduct', 'tbFornecedorProduto', 'cdFornecedor', 'cdProduto')
        ->as('produtos')
        ->withPivot('cdFornecedor')
        ->withTimestamps();
    }

}
