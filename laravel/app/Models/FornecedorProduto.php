<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FornecedorProduto extends Model
{
    protected $table = 'tbFornecedorProduto';
    protected $fillable = ['cdFornecedor', 'cdProduto'];
}
