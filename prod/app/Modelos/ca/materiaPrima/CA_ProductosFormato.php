<?php

namespace App\Modelos\ca\materiaPrima;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosFormato extends Model
{
    protected $table = 'ca_mp_formato';

    protected $fillable = [
        'id', 'nombre', 'estado', 'created_at', 'updated_at', 'sucursal_id', 'user_create_id'
    ];
}