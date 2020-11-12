<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoParcelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbPagamentoParcela', function (Blueprint $table) {
            $table->increments('cdParcela');
            $table->unsignedBigInteger('cdPagamento')->references('cdPagamento')->on('tbPagamento')->onUpdate('cascade')->onDelete('cascade');
            $table->double('valor', 10, 2);
            $table->string('situacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbPagamentoParcela');
    }
}
