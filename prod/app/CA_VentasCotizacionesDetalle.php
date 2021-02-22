<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CA_VentasCotizacionesDetalle extends Model
{
    protected $table = 'ca_ventas_cotizaciones_detalle';

    protected $fillable = [
        'id','estado','producto_id','precio','cantidad','cotizacion_id','empresa_id','user_create_id','created_at','updated_at'
    ];
}
