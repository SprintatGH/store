<?php

namespace App\Http\Controllers\ca\administracion\clientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\administracion\CA_Clientes;
use App\Modelos\ca\administracion\CM_TipoClientes;
use App\Http\Controllers\Controller;
use App\Modelos\ca\administracion\CA_Productos;
use App\Modelos\ca\administracion\CA_PreciosEspeciales;

class CA_ClientesController extends Controller
{
   
    
    public function index()
    {
        $contenido = CA_Clientes::where('empresa_id',session('id_empresa'))->where('estado',1)->paginate(10);
        $cm_tipo_cliente = CM_TipoClientes::where('estado',1)->get();
        $productos = CA_Productos::where('empresa_id', session('id_empresa'))->where('estado',1)->get();

        
        $action="listado";

        return view('cliente/administracion/clientes/index', compact('contenido','action','cm_tipo_cliente','productos'));
    }

 
    public function DTindex() 
    {
        $contenido = CA_Clientes::where('sucursal_id',session('sucursal'))->where('estado',1)->get();
        $dataArray = json_decode($contenido, true);

        return $dataArray;
    }

    
    public function productos($id)
    {
        $preciosEs = CA_PreciosEspeciales::
            join('CA_Productos','CA_Productos.id','ca_precios_especiales.producto_id')
            ->select('ca_precios_especiales.id as id',
                        'ca_precios_especiales.created_at as fecha',
                        'CA_Productos.nombre as nomProducto',
                        'ca_precios_especiales.precio as precio' )
            ->where('ca_precios_especiales.cliente_id', $id)
            ->where('ca_precios_especiales.empresa_id',session('id_empresa'))
            ->get();
    
            return response()->json($preciosEs);
    }
    

    public function store(Request $request)
    {
        
        $ca_cli = new CA_Clientes;

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
        
        return redirect()->action('ca\administracion\clientes\CA_ClientesController@index');
    }

    
    
    public function edit($id)
    {
         $ca_cli = CA_Clientes::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
         return response()->json($ca_cli);
    }


    public function update(Request $request)
    {
        
        $ca_cli = CA_Clientes::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($ca_cli){

            $ca_cli->tipo_cliente_id = $request->tipo_cliente;
            $ca_cli->nombre = $request->nombre;
            $ca_cli->giro = $request->giro;
            $ca_cli->direccion = $request->direccion;
            $ca_cli->telefono = $request->telefono;
            $ca_cli->email = $request->email;
            $ca_cli->save();
        }

        return redirect()->action('ca\administracion\clientes\CA_ClientesController@index');
    }


    public function estado($id,$estado)
    {
        $ca_cli = CA_Clientes::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($ca_cli){
                $ca_cli->estado = $estado; 
                $ca_cli->save();
        }
       
        return redirect()->action('ca\administracion\clientes\CA_ClientesController@index');
    }

    public function precioEspecial(Request $request)
    { 
        $precioEs = new CA_PreciosEspeciales;

        $precioEs->estado= 1;
        $precioEs->precio=$request->productoPrecio;
        $precioEs->cliente_id = $request->id_cliente;
        $precioEs->producto_id = $request->producto;
        $precioEs->user_id = Auth::user()->id;
        $precioEs->empresa_id = session('id_empresa');
        $precioEs->save();

        return redirect()->action('ca\administracion\clientes\CA_ClientesController@index');
    }
}
