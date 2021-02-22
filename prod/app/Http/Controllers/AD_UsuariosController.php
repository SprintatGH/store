<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresas;
use App\Perfiles;
use App\Mail;
use App\MailUsuarioNuevo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AD_UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contenido = User::all();

        $contenido = User::
        join('perfiles', 'perfiles.id', '=', 'users.perfil_id')
        ->join('empresas', 'empresas.id', '=', 'users.empresa_id')
        ->select('users.id', 'users.name as nombre','users.email as email','users.fono as fono','users.estado as estado', 'users.created_at','perfiles.nombre as perfil','empresas.nombre as empresa','empresas.estado as empresaEstado','perfiles.estado as perfilEstado')
        ->get();
        $action="listado";
  
        $empresas = DB::table('empresas')->where('estado', '1')->get();
        $perfiles = DB::table('perfiles')->where('estado', '1')->get();

        return view('administrador/usuarios/index', compact('contenido','action','empresas','perfiles'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuario = new user;

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->fono = $request->telefono;
        $usuario->empresa_id = $request->empresa;
        $usuario->perfil_id = $request->perfil;
        $usuario->password = Hash::make($request->contraseña);
        $usuario->estado = 1;
        $usuario->save();
           

        return redirect()->action('AD_UsuariosController@index');
      
        
    }

 
    public function edit($id)
    {
       
          
  
    }


    public function update(Request $request)
    {
       
       
    }




    public function estado($id,$estado)
    {
        
        $usuario = User::find($id);

        if ($usuario){

            $usuarioActivo = Auth::user()->id;

            if ($usuarioActivo <> $id){

                $usuario->estado = $estado;
                $usuario->save();

            }

        }

    
        return redirect()->action('AD_UsuariosController@index');
    }


}
