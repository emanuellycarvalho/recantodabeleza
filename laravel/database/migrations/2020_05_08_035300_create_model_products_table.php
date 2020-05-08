<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbProduto', function (Blueprint $table) {
            $table->increments('cdProduto');
            $table->string('nmProduto');
            $table->string('marca');
            $table->string('descricao')->nullable();
            $table->integer('qtd');
            $table->double('preco', 10, 2);
            $table->integer('comissao');
            $table->string('foto');
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
        Schema::dropIfExists('TbProduto');
    }
}
