<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModelProduct extends Migration
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
            $table->double('precoProduto', 9, 2);
            $table->double('comissao', 4, 2);
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
        Schema::dropIfExists('TbProduto');
    }
}
