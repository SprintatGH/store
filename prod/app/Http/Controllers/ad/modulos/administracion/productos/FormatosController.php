<?php

namespace App\Http\Controllers\ad\modulos\administracion\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Modelos\ad\modulos\administracion\productos\Formatos;
use Illuminate\Support\Facades\DB;
use App\Empresas;

class FormatosController extends Controller
{
 
    public function index()
    {
        $contenido = Formatos::
        join('empresas', 'empresas.id', '=', 'formatos.empresa_id')
        ->select('formatos.id', 'formatos.nombre as nombre','formatos.estado as estado', 'formatos.created_at','empresas.nombre as empresa','empresas.estado as empresaEstado')
        ->where('formatos.estado',1)
        ->paginate(10);
        $action="listado";
        $empresas = DB::table('empresas')->where('estado', '1')->get();

        return view('administrador/modulos/administracion/productos/formatos/index', compact('contenido','action','empresas'));
    }


    public function store(Request $request)
    {
        $formatos = new Formatos;

        $formatos->nombre = $request->nombre;
        $formatos->empresa_id = $request->empresa;
        $formatos->estado = 1;
        $formatos->save();
           
        return redirect()->action('ad\modulos\administracion\productos\FormatosController@index');
      
    }

    public function estado($id,$estado)
    {
        $formato = Formatos::find($id);

        if ($formato){

                $formato->estado = $estado;
                $formato->save();
            
        }
    
        return redirect()->action('ad\modulos\administracion\productos\FormatosController@index');
   
    }

}