<?php

namespace App\Modelos\ca\administracion;

use Illuminate\Database\Eloquent\Model;

class CA_PreciosEspeciales extends Model
{
    protected $table = 'ca_precios_especiales';

    protected $fillable = [
        'id','estado','precio','cliente_id','producto_id','user_id','empresa_id','created_at','updated_at'
    ];
}