<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbFuncionarioServico', function (Blueprint $table) {
            $table->unsignedBigInteger('cdServico')->references('cdServico')->on('tbServico')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cdFuncionario')->references('cdFuncionario')->on('tbFuncionario')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tbFuncionarioServico');
    }
}
