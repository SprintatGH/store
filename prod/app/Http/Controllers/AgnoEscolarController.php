<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgnoEscolar;

class AgnoEscolarController extends Controller
{
   
    
    public function index()
    {
        $contenido = AgnoEscolar::where('empresa_id',session('id_empresa'))->paginate(10);
 
        return view('agno_escolar/index', compact('contenido'));
    }

   
    

    

    public function store(Request $request)
    {
        
        $agno = new AgnoEscolar;

        $fecha_inicio = date('Y-m-d', strtotime($request->inicio));
        $fecha_termino = date('Y-m-d', strtotime($request->termino));

        $agno->agno = $request->agno;
        $agno->fecha_inicio = $fecha_inicio;
        $agno->fecha_termino = $fecha_termino;
        $agno->empresa_id = session('id_empresa');
        $agno->estado = 1;
        $agno->save();
        
        return redirect()->action('AgnoEscolarController@index');
    }

    
    
    public function edit($id)
    {
         $agno = AgnoEscolar::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
         return response()->json($agno);
    }



    public function update(Request $request)
    {
        
        $agno = AgnoEscolar::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($agno){

            $fecha_inicio = date('Y-m-d', strtotime($request->inicio));
            $fecha_termino = date('Y-m-d', strtotime($request->termino));

            $agno->agno = $request->agno;
            $agno->fecha_inicio = $fecha_inicio;
            $agno->fecha_termino = $fecha_termino;
            $agno->save();
        }

        return redirect()->action('AgnoEscolarController@index');
    }


    public function estado($id,$estado)
    {
        $agno = AgnoEscolar::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($agno){
                $agno->estado = $estado;
                $agno->save();
        }
       
        return redirect()->action('AgnoEscolarController@index');
    }
}
