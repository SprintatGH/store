<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use App\Constants\Cliente as ConstCliente;

class ControlDespachoDetalle extends Model
{
    protected $table = 'ca_control_despacho_detalle';

    protected $fillable = [
        'id','estado','producto_id','precio','cantidad','cotizacion_id','sucursal_id','empresa_id','user_create_id','created_at','updated_at'
    ];

    public static function ventasDelMes()
    {
      
        $inicioMes= Carbon::now()->startOfMonth();
        $terminoMes = Carbon::now()->endOfMonth();
        //$query->whereBetween('age', [$ageFrom, $ageTo]);
        $ventas = ControlDespachoDetalle::
        join('ca_control_despacho','ca_control_despacho.id','ca_control_despacho_detalle.cotizacion_id')
        ->select(DB::raw('SUM(IFNULL(ca_control_despacho_detalle.precio,0) * IFNULL(ca_control_despacho_detalle.cantidad,0)) as total'))
        ->whereBetween('ca_control_despacho.created_at', [$inicioMes, $terminoMes])
        ->where('ca_control_despacho.empresa_id', session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id', session('sucursal'))
        ->where('ca_control_despacho.es_venta',1)
        ->where('ca_control_despacho_detalle.estado',1)
        ->where('ca_control_despacho.estado',ConstCliente::CONTROL_DESPACHO_CERRADO)
        // ->where('ca_control_despacho.estado_id',ConstCliente::CONTROL_DESPACHO_ESTADO_PAGADO)
        ->get();

        return $ventas;
        
    }


    public static function productosMasVendidos()
    {

        $inicioMes= Carbon::now()->startOfMonth();
        $terminoMes = Carbon::now()->endOfMonth();

        $ventas = ControlDespachoDetalle::
        join('ca_control_despacho','ca_control_despacho.id','ca_control_despacho_detalle.cotizacion_id')
        ->join('ca_productos','ca_productos.id','ca_control_despacho_detalle.producto_id')
        ->select(   'ca_productos.id',
                    'ca_productos.nombre',
                    'ca_productos.formato',
                    'ca_productos.avatar',
            DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) as cantidad'),
            DB::raw('SUM(IFNULL(ca_control_despacho_detalle.precio,0) * IFNULL(ca_control_despacho_detalle.cantidad,0)) as ganancia'))
        ->where('ca_control_despacho.empresa_id', session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id', session('sucursal'))
        ->whereBetween('ca_control_despacho.created_at', [$inicioMes, $terminoMes])
        ->where('ca_control_despacho_detalle.estado',1)
        ->where('ca_control_despacho.es_venta',1)
        ->where('ca_productos.estado', 1)
        ->where('ca_control_despacho.estado',ConstCliente::CONTROL_DESPACHO_CERRADO)
        // ->where('ca_control_despacho.estado_id',ConstCliente::CONTROL_DESPACHO_ESTADO_PAGADO)
        ->groupBy('ca_productos.id','ca_productos.nombre','ca_productos.avatar')
        ->orderByRaw(DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) DESC'))
        ->take(5)
        ->get();

        return $ventas;

    }

    public static function topClientes()
    {
        $inicioMes= Carbon::now()->startOfMonth();
        $terminoMes = Carbon::now()->endOfMonth();

        $ventas = ControlDespachoDetalle::
        join('ca_control_despacho','ca_control_despacho.id','ca_control_despacho_detalle.cotizacion_id')
        ->join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->select(   'ca_clientes.id',
                    'ca_clientes.nombre',
            DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) as cantidad'),
            DB::raw('SUM(IFNULL(ca_control_despacho_detalle.precio,0) * IFNULL(ca_control_despacho_detalle.cantidad,0)) as ganancia'))
        ->where('ca_control_despacho.empresa_id', session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id', session('sucursal'))
        ->whereBetween('ca_control_despacho.created_at', [$inicioMes, $terminoMes])
        ->where('ca_control_despacho_detalle.estado',1)
        ->where('ca_control_despacho.es_venta',1)
        ->where('ca_clientes.estado', 1)
        ->where('ca_control_despacho.estado',ConstCliente::CONTROL_DESPACHO_CERRADO)
        // ->where('ca_control_despacho.estado_id',ConstCliente::CONTROL_DESPACHO_ESTADO_PAGADO)
        ->groupBy('ca_clientes.id','ca_clientes.nombre')
        ->orderByRaw(DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) DESC'))
        ->take(5)
        ->get();

        return $ventas;

    }


}
