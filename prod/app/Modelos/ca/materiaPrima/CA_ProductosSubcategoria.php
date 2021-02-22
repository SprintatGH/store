<?php

namespace App\Modelos\ca\materiaPrima;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosSubcategoria extends Model
{
    protected $table = 'ca_mp_subcategoria';

    protected $fillable = [
        'id' ,'estado' ,'nombre' ,'descripcion' ,'created_at' ,'updated_at','categoria_id' ,'sucursal_id' ,'user_create_id'
    ];
}