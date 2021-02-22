<?php

namespace App\Modelos\ca\ventas;

use Illuminate\Database\Eloquent\Model;

class ControlDespachoEstados extends Model
{
    protected $table = 'ca_control_despacho_estados';

    protected $fillable = [
        'id','estado','nombre','descripcion','empresa_id','user_create_id','created_at','updated_at'
    ];
}
