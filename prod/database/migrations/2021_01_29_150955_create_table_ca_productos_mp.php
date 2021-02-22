<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCaProductosMp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_productos_mp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('avatar');
            $table->integer('stock_minimo');
            $table->integer('precio_por_mayor');
            $table->integer('precio_unitario');
            $table->timestamps();

            $table->bigInteger('subcategoria_id')->unsigned()->default(1);
            $table->foreign('subcategoria_id')->references('id')->on('ca_mp_subcategoria');

            $table->bigInteger('formato_id')->unsigned()->default(1);
            $table->foreign('formato_id')->references('id')->on('ca_formato_mp');

            $table->bigInteger('sucursal_id')->unsigned()->default(1);
            $table->foreign('sucursal_id')->references('id')->on('ca_sucursales');

            $table->bigInteger('user_create_id')->unsigned();
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_productos_mp');
    }
}
