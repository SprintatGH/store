<?php

namespace App\Http\Controllers\ca\ventas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\ventas\CA_VentasCotizaciones;
use App\Modelos\ca\ventas\CA_VentasCotizacionesDetalle;
use App\Modelos\ca\ventas\CA_VentasCotizacionesEstados;
use App\Modelos\ca\administracion\CA_Clientes;
use App\Modelos\ca\administracion\CA_Productos;
use App\Empresas;
use PDF;
use App\Modelos\ad\modulos\administracion\productos\Formatos;
use App\Modelos\ad\modulos\administracion\productos\ProductoFormato;
use App\Http\Controllers\Controller;

class CA_VentasCotizacionesController extends Controller
{
   
    
    public function index()
    {
     
        $contenido = CA_VentasCotizaciones::
        join('ca_clientes','ca_clientes.id','ca_ventas_cotizaciones.cliente_id')
        ->join('ca_ventas_cotizaciones_estados', 'ca_ventas_cotizaciones_estados.id', '=', 'ca_ventas_cotizaciones.estado_id')
        ->select('ca_ventas_cotizaciones.id as id','ca_ventas_cotizaciones.created_at as fecha','ca_ventas_cotizaciones.estado as estado','ca_clientes.Nombre as nombre_cliente','ca_ventas_cotizaciones.valor_despacho as valor_despacho','ca_ventas_cotizaciones_estados.nombre as nombre_estado')
        ->where('ca_ventas_cotizaciones.empresa_id',session('id_empresa'))
        ->where('ca_ventas_cotizaciones_estados.estado', 1)
        ->where('ca_ventas_cotizaciones.estado',1)
        ->where('ca_clientes.estado',1)
        ->get();
     
        $clientes = CA_Clientes::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $estados = CA_VentasCotizacionesEstados::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        
        $action="listado";

        return view('cliente/ventas/cotizaciones/index', compact('contenido','action','clientes','estados'));
    }

    public function nuevo()
    {
        $clientes = CA_Clientes::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $estados = CA_VentasCotizacionesEstados::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/ventas/cotizaciones/nuevo', compact('action','estados','clientes'));
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

        $ca_venta_cot_det = new CA_VentasCotizacionesDetalle;
        
        $ca_venta_cot_det->empresa_id = session('id_empresa');
        $ca_venta_cot_det->user_create_id = Auth::user()->id;
        $ca_venta_cot_det->estado = 1;
        $ca_venta_cot_det->producto_id = $request->productos;
        $ca_venta_cot_det->precio = $precio;
        $ca_venta_cot_det->cantidad = $request->cantidad;
        $ca_venta_cot_det->formato_id = $request->formatosStock;
        $ca_venta_cot_det->cotizacion_id = $request->id_cotizacion;
        $ca_venta_cot_det->save();
        
        return $this->detalle($request->id_cotizacion);
    }

    public function store(Request $request)
    {
        
        $ca_venta_cot = new CA_VentasCotizaciones;
        
        $ca_venta_cot->empresa_id = session('id_empresa');
        $ca_venta_cot->user_create_id = Auth::user()->id;
        $ca_venta_cot->estado = 1;
        $ca_venta_cot->descripcion = $request->descripcion;
        $ca_venta_cot->valor_despacho = $request->valor_despacho;
        $ca_venta_cot->estado_id = $request->estado;
        $ca_venta_cot->cliente_id = $request->cliente;
        $ca_venta_cot->save();
        
        return redirect()->action('ca\ventas\CA_VentasCotizacionesController@index');
    }


    public function vista_previa($id)
    {
        $info_empresa = Empresas::where('id',session('id_empresa'))->first();
        $ca_venta_cot = CA_VentasCotizaciones::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
        $ca_cliente = CA_Clientes::where('id',$ca_venta_cot->cliente_id)->where('empresa_id',session('id_empresa'))->first();
    
        $contenido =CA_VentasCotizacionesDetalle::
            join('ca_productos','ca_productos.id','ca_ventas_cotizaciones_detalle.producto_id')
            ->select('ca_ventas_cotizaciones_detalle.id as id','ca_ventas_cotizaciones_detalle.estado as estado','ca_ventas_cotizaciones_detalle.precio as precio','ca_ventas_cotizaciones_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.descripcion as descripcion_producto','ca_productos.formato as nombre_formato')
            ->where('ca_ventas_cotizaciones_detalle.cotizacion_id',$id)
            ->where('ca_ventas_cotizaciones_detalle.estado',1)
            ->where('ca_ventas_cotizaciones_detalle.empresa_id',session('id_empresa'))
            ->get();

        $subtotal=0;
        foreach ($contenido as $items)
        {
            $subtotal += ($items->precio * $items->cantidad);
        }
     
        $fecha= date('d-m-Y');

        $action="listado";
        return view('cliente/ventas/cotizaciones/vista_previa', compact('action','info_empresa','id','ca_cliente','fecha','contenido','subtotal','ca_venta_cot'));
    }



    public function estado($id,$estado)
    {
        $ca_venta_cot = CA_VentasCotizaciones::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($ca_venta_cot){
                $ca_venta_cot->estado = $estado;
                $ca_venta_cot->save();
        }
       
        return redirect()->action('ca\ventas\CA_VentasCotizacionesController@index');
    }

    public function estado_detalle($id,$estado)
    {
        $ca_venta_cot_det = CA_VentasCotizacionesDetalle::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
      
        $cot_id = $ca_venta_cot_det->cotizacion_id;
        if ($ca_venta_cot_det){
                $ca_venta_cot_det->estado = $estado;
                $ca_venta_cot_det->save();
        }
       
        return $this->detalle($cot_id);
    }


    public function edit($id)
    {
         $ca_venta_cot = CA_VentasCotizaciones::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
         return response()->json($ca_venta_cot); 
    }

    public function precios($id)
    {
         $ca_producto = CA_Productos::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
         return response()->json($ca_producto); 
    }


    public function update(Request $request)
    {
        
        $ca_venta_cot = CA_VentasCotizaciones::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($ca_venta_cot){
            $ca_venta_cot->descripcion = $request->descripcion;
            $ca_venta_cot->estado_id = $request->estado;
            $ca_venta_cot->cliente_id = $request->cliente;
            $ca_venta_cot->valor_despacho = $request->valor_despacho;
            $ca_venta_cot->save();
        }

        return redirect()->action('ca\ventas\CA_VentasCotizacionesController@index');
    }

    public function detalle($id)
    { 
        
        $contenido =CA_VentasCotizacionesDetalle::
            join('ca_productos','ca_productos.id','ca_ventas_cotizaciones_detalle.producto_id')
            ->select('ca_ventas_cotizaciones_detalle.id as id','ca_ventas_cotizaciones_detalle.estado as estado','ca_ventas_cotizaciones_detalle.precio as precio','ca_ventas_cotizaciones_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.formato as nombre_formato')
            ->where('ca_ventas_cotizaciones_detalle.cotizacion_id',$id)
            ->where('ca_ventas_cotizaciones_detalle.estado',1)
            ->where('ca_ventas_cotizaciones_detalle.empresa_id',session('id_empresa'))
            ->get();

        $encabezado =  CA_VentasCotizaciones::
        join('ca_clientes','ca_clientes.id','ca_ventas_cotizaciones.cliente_id')
        ->join('ca_ventas_cotizaciones_estados', 'ca_ventas_cotizaciones_estados.id', '=', 'ca_ventas_cotizaciones.estado_id')
        ->select('ca_ventas_cotizaciones.id as id','ca_ventas_cotizaciones.created_at as fecha','ca_ventas_cotizaciones.estado as estado','ca_ventas_cotizaciones.descripcion as descripcion','ca_clientes.Nombre as nombre_cliente','ca_ventas_cotizaciones_estados.nombre as nombre_estado')
        ->where('ca_ventas_cotizaciones.empresa_id',session('id_empresa'))
        ->where('ca_ventas_cotizaciones_estados.estado', 1)
        ->where('ca_ventas_cotizaciones.estado',1)
        ->where('ca_clientes.estado',1)
        ->where('ca_ventas_cotizaciones.id',$id)
        ->first();


        $productos = CA_Productos::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/ventas/cotizaciones/detalle', compact('contenido','action','encabezado','productos'));
    }


    

    public function exportar($id){
        

            $info_empresa = Empresas::where('id',session('id_empresa'))->first();
        $ca_venta_cot = CA_VentasCotizaciones::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
        $ca_cliente = CA_Clientes::where('id',$ca_venta_cot->cliente_id)->where('empresa_id',session('id_empresa'))->first();
    
        $contenido =CA_VentasCotizacionesDetalle::
            join('ca_productos','ca_productos.id','ca_ventas_cotizaciones_detalle.producto_id')
            ->select('ca_ventas_cotizaciones_detalle.id as id','ca_ventas_cotizaciones_detalle.estado as estado','ca_ventas_cotizaciones_detalle.precio as precio','ca_ventas_cotizaciones_detalle.cantidad as cantidad','ca_productos.nombre as nombre_producto','ca_productos.descripcion as descripcion_producto','ca_productos.formato nombre_formato')
            ->where('ca_ventas_cotizaciones_detalle.cotizacion_id',$id)
            ->where('ca_ventas_cotizaciones_detalle.estado',1)
            ->where('ca_ventas_cotizaciones_detalle.empresa_id',session('id_empresa'))
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

        $pdf = PDF::loadView('cliente/ventas/cotizaciones/cotizacion', $data);  
        return $pdf->download('medium.pdf');
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

}