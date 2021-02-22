<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use App\Sexo;
use App\AgnoEscolar;

class AlumnosController extends Controller
{
    
    
    public function index()
    {

        $contenido = Alumnos::
        join('sexo','sexo.id','=','alumnos.sexo_id')
        ->join('agno_escolar','agno_escolar.id','=','alumnos.agno_escolar_id')
        ->where('alumnos.empresa_id',session('id_empresa'))
        ->select('alumnos.id as idAlumnos','alumnos.rut','alumnos.nombre','alumnos.estado','alumnos.edad','alumnos.direccion','alumnos.fecha_nacimiento','agno_escolar.agno','alumnos.avatar','alumnos.sexo_id','sexo.nombre as nomSexo')
        ->paginate(10);

        $sexo = Sexo::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        $agno = AgnoEscolar::where('empresa_id',session('id_empresa'))->where('estado',1)->get();

        return view('alumnos/index', compact('contenido','sexo','agno'));
    }

   

    public function store(Request $request)
    {
      
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $fileAlumno = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/'.session('id_empresa').'/alumnos', $fileAlumno);
        } else {
            $fileAlumno = null;
            
        }

        
        $fecha_nacimiento= date('Y-m-d', strtotime($request->fecha_nacimiento));
        
        $alumnos = new Alumnos;

        $alumnos->rut = $request->rut;
        $alumnos->nombre = $request->nombre;
        $alumnos->empresa_id = session('id_empresa');
        $alumnos->estado = 1;
        $alumnos->edad = $request->edad;
        $alumnos->direccion = $request->direccion;
        $alumnos->sexo_id = $request->sexo;
        $alumnos->agno_escolar_id = $request->agno;
        $alumnos->avatar = $fileAlumno;
        $alumnos->fecha_nacimiento = $fecha_nacimiento;
        $alumnos->save();
        
        return redirect()->action('AlumnosController@index');
    }

}
