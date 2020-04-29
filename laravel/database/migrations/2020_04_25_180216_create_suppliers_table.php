<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TbFornecedor', function (Blueprint $table) {
            $table->increments('cdFornecedor');
            $table->string('nmFornecedor');
            $table->string('email')>nullable(true)->change();
            $table->string('cnpj');
            $table->string('telefone');
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
        Schema::dropIfExists('TbFornecedor');
    }
}
