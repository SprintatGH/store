<?php

namespace App\Modelos\ca\administracion;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosSubcategoria extends Model
{
    protected $table = 'ca_productos_subcategoria';

    protected $fillable = [
        'id','estado','nombre','descripcion','categoria_id','empresa_id','user_create_id'
    ];
}

