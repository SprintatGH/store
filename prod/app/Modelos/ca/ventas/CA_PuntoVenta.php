<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Constants\Cliente as ConstCliente;

class CA_PuntoVenta extends Model
{
    protected $table = 'ca_punto_venta';

    protected $fillable = [
        
        'id','estado','total_venta','cantidad_productos','created_at','updated_at','user_id','empresa_id'
    ];

    public static function obtenerID()
    {
        $nuevoID = new CA_PuntoVenta;

        $nuevoID->estado = ConstCliente::PV_ESTADO_EN_PREPARACION;
        $nuevoID->total_venta =0;
        $nuevoID->cantidad_productos=0;
        $nuevoID->user_id=Auth::user()->id;
        $nuevoID->empresa_id=session('id_empresa');
        $nuevoID->save();

        $data = CA_PuntoVenta::latest('id')->first();

        return $data->id;

    }

    public static function contenido($id)
    {
        $contenido = CA_PuntoVenta::where('empresa_id', session('id_empresa'))->where('id',$id)->first();

        return $contenido;
    }



    
}
