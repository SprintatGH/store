<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente as ConstCliente;
use App\Modelos\ca\mail\Mail;
use DB;

class ControlDespacho extends Model
{
    protected $table = 'ca_control_despacho';

    protected $fillable = [
        'id','estado','descripcion','valor_despacho','estado_id','cliente_id','empresa_id','user_create_id','created_at','updated_at'
    ];


    public static function despachosAbiertos()
    {
        $contenido = ControlDespacho::
        join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->join('ca_control_despacho_estados', 'ca_control_despacho_estados.id', '=', 'ca_control_despacho.estado_id')
        ->select(   'ca_control_despacho.id as id',
                    'ca_control_despacho.created_at as fecha',
                    'ca_control_despacho.estado as estado',
                    'ca_clientes.Nombre as nombre_cliente',
                    'ca_control_despacho.valor_despacho as valor_despacho',
                    'ca_control_despacho_estados.nombre as nombre_estado')
        ->where('ca_control_despacho.empresa_id',session('id_empresa'))
        ->where('ca_control_despacho.estado_id','<>', ConstCliente::CONTROL_DESPACHO_ESTADO_PAGADO)
        ->where('ca_clientes.estado','<>',ConstCliente::CONTROL_DESPACHO_ELIMINADO)
        ->orderBy('ca_control_despacho.id', 'DESC')
        ->get();
       
        $despAbiertos=[];
        foreach ($contenido as $items)
        {
            $abierto = [
                'id' => $items->id,
                'cliente' => $items->nombre_cliente,
                'estado' => $items->nombre_estado
            ];
            array_push($despAbiertos,$abierto);
        }

        return $despAbiertos;
    }

    public static function contenidoMail()
    {
        $plantilla = mail::contenidoMail(ConstCliente::MODULO_DESPACHO);
    
        $data = (is_null($plantilla->detalle)? 'Sin contenido' : $plantilla->detalle);
        return $data;
    }
}