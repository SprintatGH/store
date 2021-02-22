<?php

namespace App\Http\Controllers\ca\ventas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\ventas\ControlDespacho;
use App\Modelos\ca\ventas\ControlDespachoDetalle;
use App\Modelos\ca\ventas\ControlDespachoEstados;
use App\Modelos\ca\ventas\CA_PuntoVenta;
use App\Modelos\ca\ventas\CA_PuntoVentaDetalle;
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

class CA_PuntoVentaController extends Controller
{


    public function index()
    {
        $action="listado";
        $total=0;
       
        $idPV = CA_PuntoVenta::obtenerID();

        return view('cliente/ventas/puntoVenta/index',compact('action','total','idPV'));
    }




    public function insertaProducto($idPV,$id)
    {
        $contenido = CA_Productos::where('codigo',$id)->first();
        if ($contenido)
        {
            $insertoProd = CA_PuntoVentaDetalle::insertarProd($idPV,$contenido->id,$contenido->precio_unitario);   
            $selectDet = CA_PuntoVentaDetalle::obtenerDetalle($idPV)->toArray();
            $data  = $selectDet;

        } else { $data= null;  }

        return response()->json($data); 
    }




    public function validaProducto($idPV,$id)
    {
        $puntoVenta = CA_PuntoVenta::contenido($idPV);

        if ($puntoVenta->estado = ConstCliente::PV_ESTADO_EN_PREPARACION){


            //valido que el producto existe
            $existeProd = CA_Productos::where('empresa_id', session('id_empresa'))->where('codigo', $id)->first();
            if (!$existeProd)
            {  $data= [  'respuesta' => 'Producto no encontrado'  ]; return response()->json($data);
            } else if ($existeProd->estado = 0) {
                $data= [  'respuesta' => 'Producto con estado eliminado'  ]; return response()->json($data);  }
            else if ($existeProd->stock_actual = 0) {
                $data= [  'respuesta' => 'Producto sin stock'  ]; return response()->json($data);  }


            //valido que no este ingresado en la venta
            $selectProd = CA_PuntoVentaDetalle::obtenerProducto($idPV,$id)->first();
            if ($selectProd)
            {  $data= [  'respuesta' => 'Producto ya esta agregado'  ]; return response()->json($data);
            } 


          //valido que el estado de la venta sea en preparacion  
        } else if ($puntoVenta->estado = ConstCliente::PV_ESTADO_ACTIVO){
            $data= [  'respuesta' => 'Venta Cerrada, verifique' ]; return response()->json($data);
        } else if ($puntoVenta->estado = ConstCliente::PV_ESTADO_ELIMINADO){
            $data= [  'respuesta' => 'Venta Eliminada, verifique'  ]; return response()->json($data);  }


            $data= [  'respuesta' => 'ok'  ]; 
            return response()->json($data);

    }



    public function obtenerTotal($id)
    {
        $contenido = CA_PuntoVentaDetalle::where('punto_venta_id',$id)->where('estado',1)->where('empresa_id', session('id_empresa'))->get();
        $total=0;
        foreach ($contenido as $items)
        {
            $suma = $items->precio * $items->cantidad;
            $total= $total + $suma;
        }
        $data=['total' => $total];

        return $data;
    }


    public function guardarPV($idPV)
    {

        $puntoVenta = CA_PuntoVenta::contenido($idPV);

        $puntoVenta->estado = ConstCliente::PV_ESTADO_ACTIVO;
        $puntoVenta->save();

        $data=['respuesta' => 'ok'];
        return response()->json($data);
    }


    public function crearPV()
    {
        $idPV = CA_PuntoVenta::obtenerID();
        $data=['respuesta' => 'ok', 'id' => $idPV];

        return response()->json($data);
    }


    public function eliminarPro($idPV,$id)
    {
        $eliminar = CA_PuntoVentaDetalle::eliminarPro($idPV,$id);
        

        $selectDet = CA_PuntoVentaDetalle::obtenerDetalle($idPV)->toArray();
        $data  = $selectDet;

        return response()->json($data);       

    }



}