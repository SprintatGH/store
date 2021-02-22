<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;

class CA_VentasCotizacionesEstados extends Model
{
    protected $table = 'ca_ventas_cotizaciones_estados';

    protected $fillable = [
        'id','estado','nombre','descripcion','empresa_id','user_create_id','created_at','updated_at'
    ];
}
