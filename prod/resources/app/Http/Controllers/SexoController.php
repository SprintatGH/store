<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sexo;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenido = Sexo::where('empresa_id',session('id_empresa'))->paginate(10);

        alert()->message('Notificación solo con mensaje');
 
        return view('sexo/index', compact('contenido'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sexo = new sexo;

        $sexo->nombre = $request->nombre;
        $sexo->empresa_id = session('id_empresa');
        $sexo->estado = 1;
        $sexo->save();
        
        return redirect()->action('SexoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sexo = Sexo::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
         return response()->json($sexo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $sexo = Sexo::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($sexo){
            $sexo->nombre = $request->nombre;
            $sexo->save();
        }

        return redirect()->action('SexoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function estado($id,$estado)
    {
      
        $sexo = Sexo::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
        
        
        if ($sexo){
                $sexo->estado = $estado;
                $sexo->save();
        }
       
        //flash("Se ha eliminado de forma exitosa!", 'danger')->important();

        return redirect()->action('SexoController@index');
    }
}
