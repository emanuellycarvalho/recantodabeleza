<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSchedulingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbAgendamento', function (Blueprint $table) {
            $table->increments('cdAgendamento');
            $table->date('dtAgendamento');
            $table->time('inicio');
            $table->time('fim');
            $table->double('valorTotal', 10, 2);
            $table->integer('cdCliente')->unsigned();
            $table->integer('cdFuncionario')->unsigned();
            $table->foreign('cdCliente')->references('cdCliente')->on('TbCliente')->onUpdate('cascade');
            $table->foreign('cdFuncionario')->references('cdFuncionario')->on('TbFuncionario')->onUpdate('cascade');
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
        Schema::dropIfExists('TbAgendamento');
    }
}
