<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelCustomersTable extends Migration
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
            $table->string('sexo');
            $table->string('telefone');
            $table->date('dtNasc')->nullable();
            $table->string('email');
            $table->string('senha');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cep');
            $table->string('rg');
            $table->string('cidade');
            $table->string('foto')->nullable();
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
