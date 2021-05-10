<?php



namespace App\Modelos\ca\ventas;



use Illuminate\Database\Eloquent\Model;



class ControlDespachoEstadosPago extends Model

{

    protected $table = 'ca_control_despacho_estados_pago';



    protected $fillable = [

        'id','estado','nombre','descripcion','sucursal_id','user_create_id','created_at','updated_at'

    ];

}