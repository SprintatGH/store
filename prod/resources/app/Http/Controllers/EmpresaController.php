<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;

class EmpresaController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $contenido = Empresas::all();

        return view('empresas.index', compact('contenido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $this->validate($request,[
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|min:9',
            'razon_social' => 'required',
            'rut' => 'required',
            'nombre_contacto' => 'required',
            'email_contacto' => 'required',
            'telefono_contacto' => 'required'
        ]);

        $empresa = new Empresas;

        $empresa->nombre = $request->nombre;
        $empresa->estado = 1;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->razon_social = $request->razon_social;
        $empresa->rut = $request->rut;
        $empresa->contacto_nombre = $request->nombre_contacto;
        $empresa->contacto_email = $request->email_contacto;
        $empresa->contacto_telefono = $request->telefono_contacto;
        $empresa->save();
        
        return back()->with('mensaje','Empresa ingresada con éxito');
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
        $contenido = Empresas::findOrFail($id);
        
        if ($contenido){

            return view('empresas/edit',compact('contenido'));

        } else {

            return back();

        }  
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
        $this->validate($request,[
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|min:9',
            'razon_social' => 'required',
            'rut' => 'required',
            'nombre_contacto' => 'required',
            'email_contacto' => 'required',
            'telefono_contacto' => 'required'
        ]);


        $empresa = Empresas::find($request->id);
        
        $empresa->nombre = $request->nombre; 
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->razon_social = $request->razon_social;
        $empresa->rut = $request->rut;
        $empresa->contacto_nombre = $request->nombre_contacto;
        $empresa->contacto_email = $request->email_contacto;
        $empresa->contacto_telefono = $request->telefono_contacto;
        $empresa->save();

        return back()->with('mensaje','Empresa modificada con éxito');
       

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
        
        $empresa = Empresas::find($id);

        if ($empresa){

                $empresa->estado = $estado;
                $empresa->save();
        }

        return redirect()->action('EmpresaController@index');
    }


}
