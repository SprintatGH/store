<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductoFormato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_formato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');
            
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('ca_productos');

            $table->bigInteger('formato_id')->unsigned();
            $table->foreign('formato_id')->references('id')->on('formatos');
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
        Schema::dropIfExists('producto_formato');
    }
}
