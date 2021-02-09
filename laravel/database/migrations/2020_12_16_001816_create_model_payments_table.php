pp<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPaymentsTable extends Migration
{
    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAtendimentoPagamento', function (Blueprint $table) {
            $table->increments('cdParcela');
            $table->unsignedBigInteger('cdAtendimento')->references('cdAtendimento')->on('tbAtendimento')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('parcela');
            $table->double('valor', 10, 2);
            $table->string('situacao');
            $table->date('dtVencimento');
            $table->double('multas', 10, 2)->nullable();
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
        Schema::dropIfExists('tbAtendimentoPagamento');
    }
}
