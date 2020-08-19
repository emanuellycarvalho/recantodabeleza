<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelAttendance extends Model
{
    protected $table = 'tbAtendimento';
    protected $fillable = ['dtAtendimento', 'valorTotal', 'cdCliente', 'situacao', 'cdFuncionario',
                            'tipoPagamento', 'qtdParcelas'];

    public function relService(){
        return $this->belongsToMany('App\Models\ModelService', 'tbAtendimentoServico', 'cdServico', 'cdAtendimento')
        ->as('servicos')
        ->withPivot('CdFuncionario', 'valorCobrado')
        ->withTimestamps(); 
    }

    public function relProduct(){
        return $this->belongsToMany('App\Models\ModelProduct', 'tbAtendimentoProduto', 'cdProduto', 'cdAtendimento')
        ->as('produtos')
        ->withPivot('quantidade', 'valorCobrado')
        ->withTimestamps(); 
    }
}
