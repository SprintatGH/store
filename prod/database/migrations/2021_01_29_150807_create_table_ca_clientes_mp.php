<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCaClientesMp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_clientes_mp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('giro');
            $table->string('telefono');
            $table->string('email');
            $table->timestamps();

            $table->bigInteger('tipo_cliente_id')->unsigned()->default(1);
            $table->foreign('tipo_cliente_id')->references('id')->on('cm_tipo_clientes');

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
        Schema::dropIfExists('ca_clientes_mp');
    }
}
