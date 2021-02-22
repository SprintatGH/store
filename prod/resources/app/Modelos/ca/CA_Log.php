<?php

namespace App\Modelos\ca;

use Illuminate\Database\Eloquent\Model;

class CA_Log extends Model
{
    protected $table = 'ca_log';

    protected $fillable = [
        'id','modulo','descripcion','ip','empresa_id','user_id','created_at','updated_at'
    ];


    public function store($data)
    {
        
        $log = new CA_Log;
        
        $log->modulo = $data['modulo'];
        $log->descripcion = $data['descripcion'];
        $log->ip = $data['ip'];
        $log->empresa_id = $data['empresa_id'];
        $log->user_id = $data['user_id'];
        $log->save();

        return true;
    }
}
