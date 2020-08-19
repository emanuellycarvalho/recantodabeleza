<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAtendimentoProduto', function (Blueprint $table) {
            $table->unsignedBigInteger('cdAtendimento')->references('cdAtendimento')->on('tbAtendimento')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cdProduto')->references('cdProduto')->on('cdProduto')->onUpdate('cascade');
            $table->double('valorCobrado', 10, 2);
            $table->integer('quantidade');
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
        Schema::dropIfExists('tbAtendimentoProduto');
    }
}
