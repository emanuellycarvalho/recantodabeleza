<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAttendance extends Model 
{
    protected $table = 'tbAtendimento';
    protected $fillable = ['dtAtendimento', 'valorTotal', 'cdCliente', 'situacao', 'cdFuncionario',
                            'tipoPagamento', 'qtdParcelas'];

    public function relService(){
        return $this->belongsToMany('App\Models\ModelService', 'tbAtendimentoServico', 'cdAtendimento', 'cdServico')
        ->withPivot('CdFuncionario', 'valorCobrado')
        ->withTimestamps(); 
    }

    public function relProduct(){
        return $this->belongsToMany('App\Models\ModelProduct', 'tbAtendimentoProduto', 'cdAtendimento', 'cdProduto')
        ->as('produtos')
        ->withPivot('quantidade', 'valorCobrado')
        ->withTimestamps(); 
    }
}
