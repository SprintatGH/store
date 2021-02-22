<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfiles')->insert(array(
            array(
                'nombre'    => 'Administrador',
                'estado'    => 1 
            ),
            array(
                'nombre'    => 'Administrador empresa',
                'estado'    => 2 
            )
          ));
    }
}
