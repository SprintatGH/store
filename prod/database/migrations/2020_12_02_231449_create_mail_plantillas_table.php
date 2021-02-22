<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailPlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_mail_plantillas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('detalle');
            $table->integer('estado');
            $table->timestamps();


            $table->bigInteger('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('modulos');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ca_mail_plantillas');
    }
}
