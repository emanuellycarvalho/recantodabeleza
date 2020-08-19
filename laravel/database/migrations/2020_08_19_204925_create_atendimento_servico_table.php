<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAtendimentoServico', function (Blueprint $table) {
            $table->unsignedBigInteger('cdAtendimento')->references('cdAtendimento')->on('tbAtendimento')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cdServico')->references('cdServico')->on('cdServico')->onUpdate('cascade');
            $table->unsignedBigInteger('cdFuncionario')->references('cdFuncionario')->on('tbFuncionario')->onUpdate('cascade');
            $table->double('valorCobrado', 10, 2);
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
        Schema::dropIfExists('tbAtendimentoServico');
    }
}
