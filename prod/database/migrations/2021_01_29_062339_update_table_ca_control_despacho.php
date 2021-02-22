<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableCaControlDespacho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ca_control_despacho', function (Blueprint $table) {
            
            $table->bigInteger('sucursal_id')->unsigned()->default(1);
            $table->foreign('sucursal_id')->references('id')->on('ca_sucursales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
