<?php

namespace App\Http\Controllers\ca\ventas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\ventas\ControlDespacho;
use App\Modelos\ca\ventas\ControlDespachoDetalle;
use App\Modelos\ca\ventas\ControlDespachoEstados;
use App\Modelos\ca\CA_Log;
use App\Modelos\ca\administracion\CA_Clientes;
use App\Modelos\ca\administracion\CA_Productos;
use App\Modelos\ca\administracion\CA_ProductosStock;
use App\Modelos\ca\administracion\CA_PreciosEspeciales;
use App\Modelos\ca\mail\Configuraciones as config;
use App\Modelos\ca\mail\Destinatarios as desti;
use App\Modelos\ca\mail\Platillas as plan;
use App\Modelos\ca\mail\Mail;
use App\Modelos\ad\Modulos;
use App\Modelos\ad\modulos\administracion\productos\Formatos;
use App\Modelos\ad\modulos\administracion\productos\ProductoFormato;
use App\Empresas;
use App\Http\Controllers\Controller;
use App\Constants\Cliente as ConstCliente;
use File;
use Storage;
use DB;
use PDF;

class ControlDespachoController extends Controller
{
   
     
    public function index()
    {
   

        $contenido = ControlDespacho::
        join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->join('ca_control_despacho_estados', 'ca_control_despacho_estados.id', '=', 'ca_control_despacho.estado_id')
        ->leftJoin('ca_control_despacho_detalle','ca_control_despacho_detalle.cotizacion_id', 'ca_control_despacho.id')
        ->select(   'ca_control_despacho.id as id',
                    'ca_control_despacho.created_at as fecha',
                    'ca_control_despacho.estado as estado',
                    'ca_control_despacho.estado_id as estadoDesp',
                    'ca_clientes.Nombre as nombre_cliente',
                    'ca_control_despacho.valor_despacho as valor_despacho',
                    'ca_control_despacho_estados.nombre as nombre_estado',
                    DB::raw('SUM(IFNULL(ca_control_despacho_detalle.precio,0) * IFNULL(ca_control_despacho_detalle.cantidad,0)) as total'),
                    DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) as cantidad')) 
        ->where('ca_control_despacho.empresa_id',session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id',session('id_empresa'))
       // ->where('ca_control_despacho_estados.estado','<>',1)
        ->where('ca_control_despacho.estado','<>', ConstCliente::CONTROL_DESPACHO_ELIMINADO)
        ->where('ca_clientes.estado',1)
        
        ->groupBy('ca_control_despacho.id',
                    'ca_control_despacho.created_at',
                    'ca_control_despacho.estado',
                    'ca_clientes.Nombre',
                    'ca_control_despacho.valor_despacho',
                    'ca_control_despacho_estados.nombre')
        ->orderBy('ca_control_despacho.id', 'DESC')
        ->get();

    
        $clientes = CA_Clientes::where('empresa_id',session('id_empresa'))->where('estado',1)->where('sucursal_id',session('sucursal'))->get();
        $estados = ControlDespachoEstados::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $destinatarios = desti::select()->where('empresa_id', session('id_empresa'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/ventas/controlDespacho/index', compact('contenido','action','clientes','estados', 'destinatarios'));
    }


    public function DTindex()
    {
     
        $contenido = ControlDespacho::
        join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->join('ca_control_despacho_estados', 'ca_control_despacho_estados.id', '=', 'ca_control_despacho.estado_id')
        ->leftJoin('ca_control_despacho_detalle','ca_control_despacho_detalle.cotizacion_id', 'ca_control_despacho.id')
        ->select(   'ca_control_despacho.id as id',
                    'ca_control_despacho.created_at as fecha',
                    'ca_control_despacho.estado as estado',
                    'ca_control_despacho.estado_id as estadoDesp',
                    'ca_clientes.Nombre as nombre_cliente',
                    'ca_control_despacho.valor_despacho as valor_despacho',
                    'ca_control_despacho_estados.nombre as nombre_estado',
                    DB::raw('SUM(IFNULL(ca_control_despacho_detalle.precio,0) * IFNULL(ca_control_despacho_detalle.cantidad,0)) as total'),
                    DB::raw('SUM(IFNULL(ca_control_despacho_detalle.cantidad,0)) as cantidad')) 
        ->where('ca_control_despacho.empresa_id',session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id',session('sucursal'))
       // ->where('ca_control_despacho_estados.estado','<>',1)
        ->where('ca_control_despacho.estado','<>', ConstCliente::CONTROL_DESPACHO_ELIMINADO)
        ->where('ca_clientes.estado',1) 
        //->where('ca_control_despacho_detalle.estado',1)
        ->groupBy('ca_control_despacho.id',
                    'ca_control_despacho.created_at',
                    'ca_control_despacho.estado',
                    'ca_clientes.Nombre',
                    'ca_control_despacho.valor_despacho',
                    'ca_control_despacho_estados.nombre')
        ->orderBy('ca_control_despacho.id', 'DESC')
        ->get();


        $array_result = json_decode($contenido,true);

        $array_data = [
            'CONTROL_DESPACHO_ABIERTO' => ConstCliente::CONTROL_DESPACHO_ABIERTO,
            'CONTROL_DESPACHO_CERRADO' => ConstCliente::CONTROL_DESPACHO_CERRADO,
            'CONTROL_DESPACHO_ESTADO_PAGADO' => ConstCliente::CONTROL_DESPACHO_ESTADO_PAGADO,
            'data' => $array_result
        ];

        return $array_data;
    }

    public function nuevo()
    {
        $clientes = CA_Clientes::where('empresa_id',session('id_empresa'))->where('estado',1)->where('sucursal_id',session('sucursal'))->get();
        $estados = ControlDespachoEstados::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/ventas/controlDespacho/nuevo', compact('action','estados','clientes'));
    }

    public function store_detalle(Request $request)
    {
     
        if ($request->in_precio ==1){
            $precio = $request->in_precio_unitario;
        } elseif ($request->in_precio == 2){
            $precio = $request->in_precio_por_mayor;
        } else {
            $precio = $request->in_precio_especial;
        }

        $ca_venta_cot_det = new ControlDespachoDetalle;
        
        $ca_venta_cot_det->empresa_id = session('id_empresa');
        $ca_venta_cot_det->sucursal_id = session('sucursal');
        $ca_venta_cot_det->user_create_id = Auth::user()->id;
        $ca_venta_cot_det->estado = 1;
        $ca_venta_cot_det->producto_id = $request->productos;
        $ca_venta_cot_det->precio = $precio;
        $ca_venta_cot_det->cantidad = $request->cantidad;
        $ca_venta_cot_det->cotizacion_id = $request->id_cotizacion;
        $ca_venta_cot_det->save();

        $ca_venta_stock = new CA_ProductosStock;
        $ca_venta_stock->estado = 1;
        $ca_venta_stock->tipo = ConstCliente::STOCK_DESCONTAR;
        $ca_venta_stock->producto_id = $request->productos;
        $ca_venta_stock->empresa_id = session('id_empresa');
        $ca_venta_stock->user_create_id = Auth::user()->id;
        $ca_venta_stock->cantidad = $request->cantidad;
        $ca_venta_stock->save();

        
        return $this->detalle($request->id_cotizacion);
    }

    public function store(Request $request)
    {
        
        if (isset($request->descripcion))
        {
            $desc = $request->descripcion;
        } else {
            $desc= '';
        }

        $ca_venta_cot = new ControlDespacho;
        
        $ca_venta_cot->empresa_id = session('id_empresa');
        $ca_venta_cot->user_create_id = Auth::user()->id;
        $ca_venta_cot->estado = 1;
        $ca_venta_cot->descripcion = $request->descripcion;
        $ca_venta_cot->valor_despacho = $request->valor_despacho;
        $ca_venta_cot->estado_id = $request->estado;
        $ca_venta_cot->cliente_id = $request->cliente;
        $ca_venta_cot->es_venta = $request->es_venta;
        $ca_venta_cot->sucursal_id = session('sucursal');
        $ca_venta_cot->save();
        
        $data = ControlDespacho::latest('id')->first();

        $data_log=[
            'modulo' => 'control_espacho_'.$data->id,
            'descripcion' => 'Se creo Despacho',
            'ip' => $this->getRealIP(),
            'empresa_id' => session('id_empresa'),
            'user_id' => Auth::user()->id,
        ];

        $log = new CA_Log;
        $storeLog = $log->store($data_log);

        return redirect()->action('ca\ventas\ControlDespachoController@index');
    }


    public function vista_previa($id)
    {
        $info_empresa = Empresas::where('id',session('id_empresa'))->first();
        $ca_venta_cot = ControlDespacho::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
        $ca_cliente = CA_Clientes::where('id',$ca_venta_cot->cliente_id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
    
        $contenido =ControlDespachoDetalle::
            join('ca_productos','ca_productos.id','ca_control_despacho_detalle.producto_id')
            ->select('ca_control_despacho_detalle.id as id','ca_control_despacho_detalle.estado as estado','ca_control_despacho_detalle.precio as precio','ca_control_despacho_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.descripcion as descripcion_producto','ca_productos.formato as nombre_formato')
            ->where('ca_control_despacho_detalle.cotizacion_id',$id)
            ->where('ca_control_despacho_detalle.estado',1)
            ->where('ca_control_despacho_detalle.empresa_id',session('id_empresa'))
            ->where('ca_control_despacho_detalle.sucursal_id',session('sucursal'))
            ->get();

        $subtotal=0;
        foreach ($contenido as $items)
        {
            $subtotal += ($items->precio * $items->cantidad);
        }
     
        $fecha= date('d-m-Y');

        $action="listado";
        return view('cliente/ventas/controlDespacho/vista_previa', compact('action','info_empresa','id','ca_cliente','fecha','contenido','subtotal','ca_venta_cot'));
    }



    public function estado($id,$estado)
    {
        $ca_venta_cot = ControlDespacho::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
    
        if ($ca_venta_cot){
                $ca_venta_cot->estado = $estado;
                $ca_venta_cot->save();
        }
        $data_log=[
            'modulo' => 'control_espacho_'.$id,
            'descripcion' => 'Se modifico el estado del despacho',
            'ip' => $this->getRealIP(),
            'empresa_id' => session('id_empresa'),
            'user_id' => Auth::user()->id,
        ];

        $log = new CA_Log;
        $storeLog = $log->store($data_log);

        return redirect()->action('ca\ventas\ControlDespachoController@index');
    }

    public function estado_detalle($id,$estado)
    {
        $ca_venta_cot_det = ControlDespachoDetalle::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
      
        $cot_id = $ca_venta_cot_det->cotizacion_id;
        if ($ca_venta_cot_det){
                $ca_venta_cot_det->estado = $estado;
                $ca_venta_cot_det->save();
        }
       
        return $this->detalle($cot_id);
    }


    public function edit($id)
    {
         $ca_venta_desp = ControlDespacho::
          join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->join('ca_control_despacho_estados', 'ca_control_despacho_estados.id', '=', 'ca_control_despacho.estado_id')
        ->select(   'ca_control_despacho.id as id',
                    'ca_control_despacho.created_at as fecha',
                    'ca_control_despacho.estado as estado',
                    'ca_control_despacho.estado_id as estadoDesp',
                    'ca_control_despacho.descripcion as descripcion',
                    'ca_clientes.Nombre as nombre_cliente',
                    'ca_control_despacho.valor_despacho as valor_despacho',
                    'ca_control_despacho_estados.nombre as nombre_estado') 
        ->where('ca_control_despacho.empresa_id',session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id',session('sucursal'))
        ->where('ca_control_despacho.id',$id)
        ->where('ca_control_despacho.estado','<>', ConstCliente::CONTROL_DESPACHO_ELIMINADO)
        ->where('ca_clientes.estado',1)
        ->first();
    
         return response()->json($ca_venta_desp); 
    }

    public function precios($id)
    {
         $ca_producto = CA_Productos::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
         $stockActual = CA_ProductosStock::stockActual($id);
         $precioEspecial = CA_PreciosEspeciales::where('producto_id',$id)->where('estado',1)->where('empresa_id', session('id_empresa'))->first();
         if (isset($precioEspecial))
         {
            $precio= $precioEspecial->precio;
         } else {
            $precio=0;
         }
         
         $data= [
            'precio_unitario' => $ca_producto->precio_unitario,
            'precio_por_mayor' => $ca_producto->precio_por_mayor,
            'stockActual' => $stockActual,
            'precio_especial' => $precio
         ];
         return response()->json($data); 
    }


    public function update(Request $request)
    {
        
        $ca_venta_cot = ControlDespacho::where('id',$request->edit_id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
       
        if ($ca_venta_cot){
            $ca_venta_cot->descripcion = $request->descripcion;
            $ca_venta_cot->estado_id = $request->estado;
            $ca_venta_cot->valor_despacho = (is_null($request->valor_despacho)? 0 : $request->valor_despacho);
            $ca_venta_cot->save();
        }

        $data_log=[
            'modulo' => 'control_espacho_'.$request->edit_id,
            'descripcion' => 'Se edito el despacho',
            'ip' => 0,
            'empresa_id' => session('id_empresa'),
            'user_id' => Auth::user()->id,
        ];

        $log = new CA_Log;
        $storeLog = $log->store($data_log);

        return redirect()->action('ca\ventas\ControlDespachoController@index');
    }

    public function detalle($id)
    { 
        
        $contenido =ControlDespachoDetalle::
            join('ca_productos','ca_productos.id','ca_control_despacho_detalle.producto_id')
            ->select('ca_control_despacho_detalle.id as id','ca_control_despacho_detalle.estado as estado','ca_control_despacho_detalle.precio as precio','ca_control_despacho_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.formato as nombre_formato')
            ->where('ca_control_despacho_detalle.cotizacion_id',$id)
            ->where('ca_control_despacho_detalle.estado','<>', ConstCliente::CONTROL_DESPACHO_ELIMINADO)
            ->where('ca_control_despacho_detalle.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->get();

        $encabezado =  ControlDespacho::
        join('ca_clientes','ca_clientes.id','ca_control_despacho.cliente_id')
        ->join('ca_control_despacho_estados', 'ca_control_despacho_estados.id', '=', 'ca_control_despacho.estado_id')
        ->select('ca_control_despacho.id as id','ca_control_despacho.created_at as fecha','ca_control_despacho.estado as estado','ca_control_despacho.descripcion as descripcion','ca_clientes.Nombre as nombre_cliente','ca_control_despacho_estados.nombre as nombre_estado')
        ->where('ca_control_despacho.empresa_id',session('id_empresa'))
        ->where('ca_control_despacho.sucursal_id',session('sucursal'))
        ->where('ca_control_despacho_estados.estado', 1)
        ->where('ca_control_despacho.estado','<>', ConstCliente::CONTROL_DESPACHO_ELIMINADO)
        ->where('ca_clientes.estado',1)
        ->where('ca_control_despacho.id',$id)
        ->first();
 

        $productos = CA_Productos::where('empresa_id',session('id_empresa'))->where('estado',1)->where('sucursal_id',session('sucursal'))->get();
      
        $action="listado";

        return view('cliente/ventas/controlDespacho/detalle', compact('contenido','action','encabezado','productos'));
    }


    

    public function exportar($id){
        
        
        $info_empresa = Empresas::where('id',session('id_empresa'))->first();
        $ca_venta_cot = ControlDespacho::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id', session('sucursal'))->first();
        $ca_cliente = CA_Clientes::where('id',$ca_venta_cot->cliente_id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
    
        $contenido =ControlDespachoDetalle::
            join('ca_productos','ca_productos.id','ca_control_despacho_detalle.producto_id')
            ->select('ca_control_despacho_detalle.id as id','ca_control_despacho_detalle.estado as estado','ca_control_despacho_detalle.precio as precio','ca_control_despacho_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.descripcion as descripcion_producto','ca_productos.formato as nombre_formato')
            ->where('ca_control_despacho_detalle.cotizacion_id',$id)
            ->where('ca_control_despacho_detalle.estado',1)
            ->where('ca_control_despacho_detalle.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->get();

        $subtotal=0;
        foreach ($contenido as $items)
        {
            $subtotal += ($items->precio * $items->cantidad);
        }
     
        $fecha= date('d-m-Y');

        $data = [          
            'info_empresa' => $info_empresa,          
            'id' => $id,          
            'ca_cliente' => $ca_cliente,
            'fecha' => $fecha,
            'contenido' => $contenido,
            'subtotal' => $subtotal,
            'ca_venta_cot' => $ca_venta_cot
        ];
        //$path = 'C:\Users\jpabl\OneDrive\Escritorio\prueba';
        $nombreArchivo ="Control De Despacho N° ".$id.".pdf";
        $pdf = PDF::loadView('cliente/ventas/controlDespacho/guiaSalida', $data); 
        //$pdf->save($path . '/' . $nombreArchivo);
        
        return $pdf->download($nombreArchivo);
    }


    public function stock_formatos($id)
    {
        $formatos = ProductoFormato::
        join('formatos', 'formatos.id','producto_formato.formato_id')
        ->select('formatos.id as id', 'formatos.nombre')
        ->where('producto_formato.producto_id', $id)
        ->where('formatos.estado',1)
        ->where('producto_formato.estado',1)
        ->get();

        return response()->json($formatos); 
    }

    public function cambio_estado($id, $estado)
    {
        if ($estado == ConstCliente::CONTROL_DESPACHO_ELIMINADO){
            $nuevoEstado = ConstCliente::CONTROL_DESPACHO_ABIERTO;
        } elseif ($estado == ConstCliente::CONTROL_DESPACHO_ABIERTO){
            $nuevoEstado=ConstCliente::CONTROL_DESPACHO_CERRADO;
        } else {
            $nuevoEstado = ConstCliente::CONTROL_DESPACHO_ABIERTO;
        }
        
        $ca_despacho = ControlDespacho::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
      
        if ($ca_despacho){
            $ca_despacho->estado = $nuevoEstado;
            $ca_despacho->save();
        }
        
        $data_log=[
            'modulo' => 'control_espacho_'.$id,
            'descripcion' => 'Se cambio el estado del despacho a '.$nuevoEstado,
            'ip' => $this->getRealIP(),
            'empresa_id' => session('id_empresa'),
            'user_id' => Auth::user()->id,
        ];

        $log = new CA_Log;
        $storeLog = $log->store($data_log);

        return redirect()->action('ca\ventas\ControlDespachoController@detalle',compact('id'));
    }


    public function mail($id)
    {

       // dd($request);
        //****************** generar archivo adjunto **********************/
            $info_empresa = Empresas::where('id',session('id_empresa'))->first();
            $ca_venta_cot = ControlDespacho::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
            $ca_cliente = CA_Clientes::where('id',$ca_venta_cot->cliente_id)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
        
            $contenido =ControlDespachoDetalle::
                join('ca_productos','ca_productos.id','ca_control_despacho_detalle.producto_id')
                ->select('ca_control_despacho_detalle.id as id','ca_control_despacho_detalle.estado as estado','ca_control_despacho_detalle.precio as precio','ca_control_despacho_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.descripcion as descripcion_producto','ca_productos.formato as nombre_formato')
                ->where('ca_control_despacho_detalle.cotizacion_id',$id)
                ->where('ca_control_despacho_detalle.estado',1)
                ->where('ca_control_despacho_detalle.empresa_id',session('id_empresa'))
                ->where('ca_productos.sucursal_id',session('sucursal'))
                ->get();

            $subtotal=0;
            foreach ($contenido as $items)
            {
                $subtotal += ($items->precio * $items->cantidad);
            }
        
            $fecha= date('d-m-Y');

            $data = [          
                'info_empresa' => $info_empresa,          
                'id' => $id,          
                'ca_cliente' => $ca_cliente,
                'fecha' => $fecha,
                'contenido' => $contenido,
                'subtotal' => $subtotal,
                'ca_venta_cot' => $ca_venta_cot
            ];
    
            $path = $_SERVER['DOCUMENT_ROOT'].'/'.session('id_empresa').'/controlDespacho';
            $nombreArchivo ="Control De Despacho N° ".$id.".pdf";

            if (!File::exists($path))  {  File::makeDirectory($path, 0777, true, true);  }

            $pdf = PDF::loadView('cliente/ventas/controlDespacho/guiaSalida', $data); 
            $pdf->save($path . '/' . $nombreArchivo);

        //****************** fin de generar archivo adjunto **********************/

        $mailDestinatario = desti::select('email')->where('empresa_id', session('id_empresa'))->where('estado',1)->first();
            
        //dd($mailDestinatario);

        $modulo = Modulos::where('id', ConstCliente::MODULO_DESPACHO)->where('empresa_id', session('id_empresa'))->first();

        $asunto = session('empresa')." - Control De Despacho N° ".$id;

        Mail::enviarMail($asunto, $path, $nombreArchivo,$mailDestinatario, $info_empresa->email);

        return redirect()->action('ca\ventas\ControlDespachoController@index');
    }



    function getRealIP()
    {

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }

    }

}