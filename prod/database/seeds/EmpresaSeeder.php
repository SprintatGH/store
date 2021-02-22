<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert(array(
            array(
            'nombre' => 'SPRINTAT',
            'estado' => 1,
            'direccion' => 'Lira 499',
            'telefono'  => '192837465',     
            'razon_social' => 'Ingenieria de software',
            'rut'   => '1111111111',
            'contacto_nombre' => 'Evelyn Escudero',
            'contacto_email' => 'evelyn.escudero@strintat.cl',
            'contacto_telefono' => '987654321',
            ),
            array(
                'nombre' => 'EMPRESA PRUEBA',
                'estado' => 1,
                'direccion' => 'Lira 499',
                'telefono'  => '192837465',     
                'razon_social' => 'Jardin de prueba',
                'rut'   => '1111111111',
                'contacto_nombre' => 'Evelyn Escudero',
                'contacto_email' => 'evelyn.escudero@strintat.cl',
                'contacto_telefono' => '987654321',
                )
        ));
    }
}
