<?php

namespace App\Modelos\ca\materiaPrima;

use Illuminate\Database\Eloquent\Model;

class CA_Productos extends Model
{
    protected $table = 'ca_mp_productos';

    protected $fillable = [
        'id' ,'estado' ,'nombre' ,'descripcion','formato' ,'avatar' ,'stock_minimo' ,'precio_por_mayor' , 'precio_unitario' ,'created_at' ,'updated_at' ,'subcategoria_id' ,'sucursal_id' ,'user_create_id' 
    ];


    
}