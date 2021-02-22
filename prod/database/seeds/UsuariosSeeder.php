<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
            'name'      => 'Juan Pablo Basualdo',
            'estado'    => 1,
            'email'     => 'jpbasualdo@sprintat.cl',
            'fono'  => 954083474,
            'password' => Hash::make('Parabola1010'),
            'empresa_id' => 6,
            'perfil_id' => 7
        ),
        array(
            'name'      => 'Evelyn Fernanda Escudero',
            'estado'    => 1,
            'email'     => 'evelyn.escudero@strintat.cl',
            'fono'  => 954083474,
            'password' => Hash::make('techoli2020'),
            'empresa_id' => 6,
            'perfil_id' => 7
        ),
        array(
            'name'      => 'empresa administrador',
            'estado'    => 1,
            'email'     => 'administrador@empresa.cl',
            'fono'  => 954083474,
            'password' => Hash::make('empresa2020'),
            'empresa_id' => 7,
            'perfil_id' => 8
        )
        ));     
    }
}
