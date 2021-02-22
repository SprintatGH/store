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

class UsuarioController extends Controller
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
        ->select('users.id', 'users.name','users.email','users.fono','users.estado', 'users.created_at','perfiles.nombre as perfil','empresas.nombre as empresa','empresas.estado as empresaEstado','perfiles.estado as perfilEstado')
        ->get();
    
  
        return view('users/index', compact('contenido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $empresas = DB::table('empresa')->where('estado', '1')->get();
        $perfiles = DB::table('perfiles')->where('estado', '1')->get();
        $interno = DB::table('perfil_interno')->where('estado', '1')->get();

        return view('usuarios/create', compact('empresas','perfiles','interno'));
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
            'email' => 'required|unique:users,email',
            'contraseña' => 'required|min:8',
            'empresa' => 'required',
            'perfil' => 'required',
            'perfil_interno' => 'required',
            'telefono' => 'required'
        ]);

        $usuario = new user;

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->fono = $request->telefono;
        $usuario->empresa_id = $request->empresa;
        $usuario->perfil_id = $request->perfil;
        $usuario->interno_id = $request->perfil_interno;
         $usuario->password = Hash::make($request->contraseña);
        $usuario->estado = 1;
        $usuario->save();
        
        //$receivers = Receiver::pluck('email');
        $call[]= array(
            'ID'                    => 'idTask',
            'Proyecto'              => 'nomProyecto',
            'Estado'                => 'nomEstado',
            'Asignado a'            => 'name',
            'Fecha Comprometida'    => 'fecha_comprometida',
            'Ultima Actualizacion'  => 'fecha_actualizacion',
            'Resumen'               => 'resumen',
            'Nro Informe'           => 'numero_informe',
            'HH Informe'            => 'hh_informe',
            'HH Gestión'            => 'hh_gestion',
            'HH Desarrollo'         => 'hh_desarrollo',
            'HH estimada'           => 'hh_estimada'
        );
        $email = $request->email;

       // Mail::to($email)->send(new MailUsuarioNuevo($call));    

        return back()->with('mensaje','Usuario ingresado con éxito');
      
        
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
       
        $contenido = User::findOrFail($id);
        
        if ($contenido){
           $empresas = DB::table('empresa')->where('id', $contenido->empresa_id)->first();
            $perfiles = DB::table('perfiles')->where('id', $contenido->perfil_id)->first(); 
            $interno = DB::table('perfil_interno')->where('id', $contenido->interno_id)->first(); 
            $PerfilesInternos = DB::table('perfil_interno')->where('estado', '1')->get();
           

            return view('usuarios/edit',compact('contenido','empresas','perfiles','interno','PerfilesInternos'));
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
            'email' => 'required',
            'telefono' => 'required|min:9'
        ]);
 
        $usuario = User::find($request->id);
        
        $usuario->email = $request->email;
        $usuario->fono = $request->telefono;
        $usuario->interno_id = $request->perfil_interno;
        
        if ($request->contraseña <> null){
            $usuario->password = Hash::make($request->contraseña);
        }

        $usuario->save();

        return back()->with('mensaje','Usuario modificado con éxito');
       
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
        
        $usuario = User::find($id);

        if ($usuario){

            $usuarioActivo = Auth::user()->id;

            if ($usuarioActivo <> $id){

                $usuario->estado = $estado;
                $usuario->save();

            }

        }

    
        return redirect()->action('UsuarioController@index');
    }


}
