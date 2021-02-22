<?php

namespace App\Modelos\ca\materiaPrima;

use Illuminate\Database\Eloquent\Model;

class CA_Clientes extends Model
{
    protected $table = 'ca_mp_clientes';

    protected $fillable = [
        'id','estado','nombre' ,'giro','telefono','email', 'created_at', 'updated_at', 'tipo_cliente_id',  'sucursal_id', 'user_id'
    ];
}