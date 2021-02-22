<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\administracion\CA_Productos;

class CA_PuntoVentaDetalle extends Model
{
    protected $table = 'ca_punto_venta_detalle';

    protected $fillable = [
        
        'id','estado','cantidad','precio','created_at','updated_at','producto_id','punto_venta_id','user_id','empresa_id'
    ];


    public static function insertarProd($idPV,$idPro, $precio)
    {
        $insert = new CA_PuntoVentaDetalle;

        $insert->estado = 1;
        $insert->cantidad = 1;
        $insert->precio = $precio;
        $insert->producto_id = $idPro;
        $insert->punto_venta_id = $idPV;
        $insert->user_id= Auth::user()->id;
        $insert->empresa_id = session('id_empresa');
        $insert->save();

        return 'ok';
    }

    public static function obtenerDetalle($idPV)
    {
        $contenido = CA_PuntoVentaDetalle::
        join('ca_productos','ca_productos.id','ca_punto_venta_detalle.producto_id')
        ->join('ca_punto_venta','ca_punto_venta.id','ca_punto_venta_detalle.punto_venta_id')
        ->select(
                'ca_punto_venta_detalle.producto_id as id',
                'ca_productos.codigo as codigo',
                'ca_punto_venta_detalle.precio as precio',
                'ca_punto_venta_detalle.cantidad as cantidad',
                'ca_punto_venta.total_venta as total',
                'ca_productos.nombre as nomproducto'
        )
        ->where('ca_punto_venta_detalle.punto_venta_id',$idPV)
        ->where('ca_punto_venta_detalle.estado',1)
        ->where('ca_punto_venta_detalle.empresa_id', session('id_empresa'))
        ->get();

        return $contenido;

    }

    public static function obtenerProducto($idPV,$id)
    {
        $contenido = CA_PuntoVentaDetalle::
        join('ca_productos','ca_productos.id','ca_punto_venta_detalle.producto_id')
        ->join('ca_punto_venta','ca_punto_venta.id','ca_punto_venta_detalle.punto_venta_id')
        ->select(
                'ca_punto_venta_detalle.producto_id as id',
                'ca_productos.codigo as codigo',
                'ca_punto_venta_detalle.precio as precio',
                'ca_punto_venta_detalle.cantidad as cantidad',
                'ca_punto_venta.total_venta as total',
                'ca_productos.nombre as nomproducto'
        )
        ->where('ca_punto_venta_detalle.punto_venta_id',$idPV)
        ->where('ca_productos.codigo',$id)
        ->where('ca_punto_venta_detalle.estado',1)
        ->where('ca_punto_venta_detalle.empresa_id', session('id_empresa'))
        ->get();

        return $contenido;

    }



    public static function eliminarPro($idPV, $id)
    {

        $contenido = CA_PuntoVentaDetalle::where('punto_venta_id',$idPV)
        ->where('producto_id',$id)
        ->where('empresa_id', session('id_empresa'))
        ->first();

        if ($contenido){
            $contenido->estado=0;
            $contenido->save();
        }
        
        return 'ok';
    }
}
