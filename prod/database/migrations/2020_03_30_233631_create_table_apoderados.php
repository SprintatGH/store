<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApoderados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut');
            $table->string('nombre');
            $table->integer('edad');
            $table->integer('estado');
            $table->datetime('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('ocupacion');
            $table->string('grado_educacion');

            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->bigInteger('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexo');

            $table->bigInteger('estado_civil_id')->unsigned();
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');

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
        Schema::dropIfExists('apoderados');
    }
}
