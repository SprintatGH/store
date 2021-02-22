<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoCivil;

class EstadoCivilController extends Controller
{
    public function index()
    {

       $contenido = EstadoCivil::where('empresa_id',session('id_empresa'))->paginate(10);

        alert()->message('Notificación solo con mensaje');
 
        return view('Estado_civil/index', compact('contenido')); 
    }

    public function store(Request $request)
    {
        
        $civil = new EstadoCivil;

        $civil->nombre = $request->nombre;
        $civil->empresa_id = session('id_empresa');
        $civil->estado = 1;
        $civil->save();
        
        return redirect()->action('EstadoCivilController@index');
    }
    

    
    public function edit($id)
    {
         $civil = EstadoCivil::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
         return response()->json($civil);
    }



    
  
    public function update(Request $request)
    {
        
        $civil = EstadoCivil::where('id',$request->id)->where('empresa_id',session('id_empresa'))->first();
        if ($civil){
            $civil->nombre = $request->nombre;
            $civil->save();
        }

        return redirect()->action('EstadoCivilController@index');
    }



    

    public function estado($id,$estado)
    {
      
        $civil = EstadoCivil::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
        
        
        if ($civil){
                $civil->estado = $estado;
                $civil->save();
        }
       
        //flash("Se ha eliminado de forma exitosa!", 'danger')->important();

        return redirect()->action('EstadoCivilController@index');
    }
}
