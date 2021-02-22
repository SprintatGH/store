<?php

namespace App\Modelos\ca\materiaPrima;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosCategoria extends Model
{
    protected $table = 'ca_mp_categoria';

    protected $fillable = [
        'id' ,'estado','nombre' ,'descripcion' ,'created_at' ,'updated_at' ,'sucursal_id' ,'user_create_id' 
    ];
}
