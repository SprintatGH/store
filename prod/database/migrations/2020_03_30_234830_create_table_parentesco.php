<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableParentesco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentesco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('estado');

            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->bigInteger('rut_alumno_id')->unsigned();
            $table->foreign('rut_alumno_id')->references('id')->on('alumnos');

            $table->bigInteger('rut_apoderado_id')->unsigned();
            $table->foreign('rut_apoderado_id')->references('id')->on('apoderados');

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
        Schema::dropIfExists('parentesco');
    }
}
