<?php



namespace App\Modelos\ca\ventas\parametros;


use Illuminate\Database\Eloquent\Model;

use DB;



class CA_EstadoPago extends Model

{

    protected $table = 'ca_control_despacho_estados_pago';



    protected $fillable = [

        'id','estado','nombre','user_create_id','created_at','updated_at','sucursal_id'

    ];


    public static function index()
    {

        $contenido = DB::table('ca_control_despacho_estados_pago')
        ->join('users','users.id','ca_control_despacho_estados_pago.user_create_id')
        ->select('ca_control_despacho_estados_pago.id','ca_control_despacho_estados_pago.estado','ca_control_despacho_estados_pago.nombre','ca_control_despacho_estados_pago.user_create_id','ca_control_despacho_estados_pago.created_at','ca_control_despacho_estados_pago.updated_at','ca_control_despacho_estados_pago.sucursal_id','users.name as name_user')
        ->where('ca_control_despacho_estados_pago.estado',1)
        ->where('ca_control_despacho_estados_pago.sucursal_id', session('sucursal'))
        ->get();

        return $contenido;

    }

}