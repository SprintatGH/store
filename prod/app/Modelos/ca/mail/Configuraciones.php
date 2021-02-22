<?php

namespace App\Modelos\ca\mail;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente as ConstCliente;
use DB;

class Configuraciones extends Model
{
    protected $table = 'ca_mail_configuraciones';

    protected $fillable = [
        'id','remitente_mail','remitente_nombre','user_id','empresa_id','user_create_id','created_at','updated_at'
    ];


    
}