<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerfilesModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles_modulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('permiso_id')->unsigned();
            $table->foreign('permiso_id')->references('id')->on('permisos');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('modulos');

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
        Schema::dropIfExists('perfiles_modulos');
    }
}
