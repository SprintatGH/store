<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Perfiles;
use App\Empresas;
use App\Modelos\ca\administracion\CA_Productos;
use App\Modelos\ad\Version;

class DashboardController extends Controller
{
    public function indexAdmin(){ 

        // Verificamos si hay sesión activa
        if (Auth::check())
        {
            
            $empresa = Empresas::findOrFail(auth()->user()->empresa_id);

            $avatar = auth()->user()->avatar;

            if ($avatar==null){
                $avatar='sin_avatar.png';
            } 

            if ($empresa->logo==null){
                $logo='sin_logo.png';
            } else {
                $logo=$empresa->logo;
            }

            //selecciono la version actual
            $version = Version::where('estado',1)->get();
           

            session(['id_empresa' => $empresa->id]);
            session(['empresa' => $empresa->nombre]);
            session(['logo' => $logo]);
            session(['avatar' => $avatar]);
            session(['version' => $version[0]['etiqueta']]);
 
        
            $contenido = CA_Productos::
            join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_productos.subcategoria_id')
            ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
            ->select('ca_productos.id as id','ca_productos.estado as estado','ca_productos.avatar as avatar','ca_productos.nombre as nombre','ca_productos.stock_minimo','ca_productos.stock_actual','ca_productos.precio_por_mayor','ca_productos.precio_unitario','ca_productos_subcategoria.nombre as nombre_subcategoria','ca_productos_categoria.nombre as nombre_categoria')
            ->where('ca_productos.empresa_id',session('id_empresa'))
            ->where('ca_productos_categoria.estado', 1)
            ->where('ca_productos_subcategoria.estado',1)
            ->where('ca_productos.estado',1)
            ->get();
 
            $sumaStockActual = 0;

            foreach ($contenido as $items){
                $sumaStockActual += $items->stock_actual;
            }            

            
            // Si tenemos sesión activa mostrará la página de inicio
            return view('dashboard/indexAdmin', compact('avatar','contenido','sumaStockActual','version'));
        }
        // Si no hay sesión activa mostramos el formulario
        return view('auth/login');

        
    }

    public function indexCliente(){
        return view('dashboard/indexCliente');
    }

    public function indexDesarrollo(){
        return view('dashboard/indexDesarrollo');
    }

    public function administracion(){
        return view('dashboard/administracion');
    }

}
