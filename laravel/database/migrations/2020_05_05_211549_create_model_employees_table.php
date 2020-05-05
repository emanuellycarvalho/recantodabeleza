<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbFuncionario', function (Blueprint $table) {
            $table->increments('cdFuncionario');
            $table->string('nmFuncionario');
            $table->string('sexo');
            $table->date('dtNasc')->nullable();
            $table->string('cpf');
            $table->string('telefone');
            $table->string('email');
            $table->string('senha');
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('complemento')->nullable();
            $table->integer('cdTipoFuncionario')->unsigned();
            $table->foreign('cdTipoFuncionario')->references('cdTipoFuncionario')->on('TbTipoFuncionario')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('TbFuncionario');
    }
}
?>