<?php

namespace App\Modelos\ac\ventas;

use Illuminate\Database\Eloquent\Model;

class ControlDespachoDetalle extends Model
{
    protected $table = 'ca_control_despacho_detalle';

    protected $fillable = [
        'id','estado','producto_id','precio','cantidad','cotizacion_id','empresa_id','user_create_id','created_at','updated_at'
    ];
}
