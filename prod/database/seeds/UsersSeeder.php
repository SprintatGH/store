<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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
            'name'          => 'Juan Pablo Basualdo',
            'estado'        => 1,
            'email'         => 'jpbasualdo@sprintat.cl',
            'fono'          => 954083474,
            'avatar'        => '',
            'password'      => Hash::make('Parabola1010'),
            'empresa_id'    => 1,
            'perfil_id'     => 1
        )
        ));     
    }
}
