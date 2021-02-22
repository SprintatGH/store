<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCaMpSubcategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_mp_subcategoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();

            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('ca_mp_ categoria');

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
        Schema::dropIfExists('ca_mp_subcategoria');
    }
}
