<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAtendimento', function (Blueprint $table) {
            $table->increments('cdAtendimento');
            $table->date('dtAtendimento');
            $table->string('situacao', 1);
            $table->double('valorTotal', 10, 2);
            $table->string('tipoPagamento');
            $table->integer('qtdParcelas');
            $table->integer('cdCliente')->unsigned();
            $table->integer('cdFuncionario')->unsigned();
            $table->integer('cdAgendamento')->nullable()->unsigned();
            $table->foreign('cdCliente')->references('cdCliente')->on('tbCliente')->onUpdate('cascade');
            $table->foreign('cdFuncionario')->references('cdFuncionario')->on('tbFuncionario')->onUpdate('cascade');
            $table->foreign('cdAgendamento')->references('cdAgendamento')->on('tbAgendamento')->onUpdate('cascade');
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
        Schema::dropIfExists('tbAtendimento');
    }
}
