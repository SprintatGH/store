<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CA_ProductosStock extends Model
{
    protected $table = 'ca_productos_stock';

    protected $fillable = [
        'id','estado','cantidad','producto_id','empresa_id','user_create_id','created_at'
    ];
}