<?php

namespace App\Modelos\ca\administracion;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosFormato extends Model
{
    protected $table = 'ca_productos_formato';

    protected $fillable = [
            'id' ,'estado','nombre','created_at', 'updated_at', 'sucursal_id', 'user_create_id'
    ];
}