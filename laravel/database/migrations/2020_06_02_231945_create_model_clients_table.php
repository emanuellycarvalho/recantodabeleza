<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbCliente', function (Blueprint $table) {
            $table->increments('cdCliente');
            $table->string('nmCliente');
            $table->string('sexo')->nullable();
            $table->date('dtNasc')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone');
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('complemento')->nullable();
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
        Schema::dropIfExists('TbCliente');
    }
}
