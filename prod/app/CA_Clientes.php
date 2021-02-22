<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CA_Clientes extends Model
{
    protected $table = 'ca_clientes';

    protected $fillable = [
        'id','estado','Nombre','giro','direccion','telefono','email','empresa_id','tipo_cliente_id','user_create_id'
    ];
}