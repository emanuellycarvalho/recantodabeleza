<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbServico', function (Blueprint $table) {
            $table->increments('cdServico');
            $table->string('nmServico');
            $table->string('descricao')->nullable();
            $table->double('valor', 10, 2);
            $table->integer('comissao');
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
        Schema::dropIfExists('TbServico');
    }
}
