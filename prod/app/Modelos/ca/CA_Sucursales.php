<?php

namespace App\Modelos\ca;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente;


class CA_Sucursales extends Model
{

    protected $table = 'ca_sucursales';

    protected $fillable = [
        'id','modulo','descripcion','ip','empresa_id','user_id','created_at','updated_at'
    ];



    public  static function getSucursalBase()
    {
        $data = CA_Sucursales::where('id', Cliente::SUCURSAL_BASE)->first();

        return $data;
    }

    public  static function getSucursal($empresa_id)
    {
        $data = CA_Sucursales::where('empresa_id', $empresa_id)
        ->where('estado',1)
        ->where('id','<>',Cliente::SUCURSAL_BASE)
        ->orderby('id','asc')
        ->get();

        return $data;
    }

}
