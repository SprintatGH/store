<?php

namespace App\Modelos\ad\modulos\administracion\productos;

use Illuminate\Database\Eloquent\Model;

class ProductoFormato extends Model
{
    protected $table = 'producto_formato';

    protected $fillable = [
        'id','estado','producto_id','empresa_id', 'formato_id'
    ];
}