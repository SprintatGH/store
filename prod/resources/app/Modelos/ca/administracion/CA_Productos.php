<?php

namespace App\Modelos\ca\administracion;

use Illuminate\Database\Eloquent\Model;

class CA_Productos extends Model
{
    protected $table = 'ca_productos';

    protected $fillable = [
        'id','estado','nombre','descripcion','avatar','codigo','stock_minimo','stock_actual','precio_por_mayor','precio_unitario','subcategoria_id','empresa_id','user_create_id'
    ];
}

