<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;

class CA_VentasCotizaciones extends Model
{
    protected $table = 'ca_ventas_cotizaciones';

    protected $fillable = [
        'id','estado','descripcion','valor_despacho','estado_id','cliente_id','empresa_id','user_create_id','created_at','updated_at'
    ];
}
