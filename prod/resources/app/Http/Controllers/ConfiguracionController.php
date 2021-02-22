<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfiles;

class ConfiguracionController extends Controller
{
    

    //********  permfiles */

    public function PerfilesIndex()
    {
        $contenido = Perfiles::all();

        return view('backend/configuracion/accesos/perfiles', compact('contenido'));
    }

    public function PerfilesEstado()
    {
        $id = Input::has('id') ? Crypt::decrypt(Input::get('id')) : NULL;
        $estado = Input::get('estado');

        $cambiaEstado = Perfiles::CambiarEstado($id,$estado);

        if ($cambiaEstado !== FALSE){
            $res = [
                'result' => 'ok',
                'id'    => $id
            ];
            return json_encode($res);
        } else {
            $res = [
                'result' => 'no',
                'id'    => $id
            ];
             return json_encode($res);
        }
        
        return redirect()->action('SexoController@index');
    }

    public function PerfilesEditar($id)
    {
        $sexo = Perfiles::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
        return response()->json($sexo);
    }


}
