<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbFornecedorProduto', function (Blueprint $table) {
            $table->unsignedBigInteger('cdFornecedor')->references('cdFornecedor')->on('tbFornecedor')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cdProduto')->references('cProdutoo')->on('tbProduto')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tbFornecedorProduto');
    }
}
