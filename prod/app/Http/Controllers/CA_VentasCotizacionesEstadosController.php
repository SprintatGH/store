<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CA_Clientes;
use App\CM_TipoClientes;
use App\CA_VentasCotizacionesEstados;

class CA_ClientesController extends Controller
{
   
    
    public function index()
    {
        $contenido = CA_VentasCotizacionesEstados::where('empresa_id',session('id_empresa'))->where('estado',1)->paginate(10);
    
        $action="listado";

        return view('cliente/configuracion/ventas/cotizacion_estado', compact('contenido','action'));
    }

   
    

    

    public function store(Request $request)
    {
        
        $ca_cli = new CA_VentasCotizacionesEstados;

        $fecha_inicio = date('Y-m-d', strtotime($request->inicio));
        $fecha_termino = date('Y-m-d', strtotime($request->termino));

        $ca_cli->empresa_id = session('id_empresa');
        $ca_cli->tipo_cliente_id = $request->tipo_cliente;
        $ca_cli->user_create_id = Auth::user()->id;
        $ca_cli->estado = 1;
        $ca_cli->nombre = $request->nombre;
        $ca_cli->giro = $request->giro;
        $ca_cli->direccion = $request->direccion;
        $ca_cli->telefono = $request->telefono;
        $ca_cli->email = $request->email;
        $ca_cli->save();
        
        return redirect()->action('CA_ClientesController@index');
    }

    
    
    public function edit($id)
    {
         $ca_cli = CA_VentasCotizacionesEstados::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
         return response()->json($ca_cli);
    }



    public function update(Request $request)
    {
        
        $ca_cli = CA_VentasCotizacionesEstados::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($ca_cli){

            $ca_cli->tipo_cliente_id = $request->tipo_cliente;
            $ca_cli->nombre = $request->nombre;
            $ca_cli->giro = $request->giro;
            $ca_cli->direccion = $request->direccion;
            $ca_cli->telefono = $request->telefono;
            $ca_cli->email = $request->email;
            $ca_cli->save();
        }

        return redirect()->action('CA_ClientesController@index');
    }


    public function estado($id,$estado)
    {
        $agno = CA_VentasCotizacionesEstados::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($agno){
                $agno->estado = $estado;
                $agno->save();
        }
       
        return redirect()->action('AgnoEscolarController@index');
    }
}
