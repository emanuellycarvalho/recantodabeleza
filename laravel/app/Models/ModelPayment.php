<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPayment extends Model
{
    protected $table = 'tbAtendimentoPagamento';
    protected $fillable = ['cdAtendimento', 'parcela', 'valor', 'situacao', 'dtVencimento', 'multas'];

    public function relAttendance(){
        return $this->hasOne('App\Models\ModelAttendance', 'cdAtendimento', 'cdAtendimento');
    }
} 