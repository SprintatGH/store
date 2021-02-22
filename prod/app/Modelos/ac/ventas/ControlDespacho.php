<?php

namespace App\Modelos\ac\ventas;

use Illuminate\Database\Eloquent\Model;

class ControlDespacho extends Model
{
    protected $table = 'ca_control_despacho';

    protected $fillable = [
        'id','estado','descripcion','valor_despacho','estado_id','cliente_id','empresa_id','user_create_id','created_at','updated_at'
    ];
}