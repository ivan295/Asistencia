<?php
namespace App\Http\Controllers;
use App\Models\Reloj;
use App\Models\Asistencia;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //para usar el Auth y traer el id del usuario logueado

class AsistenciaController extends Controller
{
    public function index(){
        $datos = \DB::table('reloj')
        ->join('modalidad','modalidad.id','=','reloj.id_modalidad_ingreso')
        ->select('reloj.*','modalidad.descripcion as modalidad_ingreso')
        ->where('id_user','=', Auth::user()->id)
        ->orderBy('id', 'desc')
        // ->where('fecha','=','2021-04-18')
        ->get();
        return view('vendor.adminlte.asistencia', compact('datos'));  
    }

    public function GetData(){
        $hoy = date("Y-m-d");
        $datos = \DB::table('reloj')
        ->select('reloj.id','reloj.estado')
        ->where('fecha','=',$hoy)
        ->get();
        return response()->json($datos);
        // dd($datos);
        //return view('vendor.adminlte.asistencia', compact('datos'));  
    }
    
    public function modalidadData(){
        $mod = \DB::table('modalidad')
        ->get();
        return response()->json($mod);
    }

    public function store(Request $request){
        // dd($request);
        $marc = new Reloj;
        if($request->btnregistro == "Ingreso"){
            $request->validate([
                'id_modalidad' => 'required|numeric',
                ]);
            $marc->fecha = $request->fecha;
            $marc->hora_ingreso = $request->hora;
            $marc->id_modalidad_ingreso = $request->id_modalidad;
            $marc->estado = $request->btnregistro;
            $marc->id_user = $request->user;
            $marc->save();
            return redirect('/asistencia');

        }elseif($request->btnregistro == "Descanso"){
            $marc= Reloj::find($request->id_reloj);
            $marc->hora_descanso = $request->hora;
            $marc->estado = $request->btnregistro;
            $marc->id_user = $request->user;
            $marc->save();
            return redirect('/asistencia');

        }elseif($request->btnregistro == "Reanudar"){
            $request->validate([
                'id_modalidad' => 'required|numeric',
                ]);
            $marc= Reloj::find($request->id_reloj);
            $marc->hora_reanudacion = $request->hora;
            $marc->id_modalidad_reanudacion = $request->id_modalidad;
            $marc->estado = $request->btnregistro;
            $marc->id_user = $request->user;
            $marc->save();
            return redirect('/asistencia');

        }elseif($request->btnregistro == "Finalizado"){
            $marc= Reloj::find($request->id_reloj);
            $marc->hora_salida = $request->hora;
            $marc->estado = $request->btnregistro;
            $marc->id_user = $request->user;
            $marc->save();
            return redirect('/asistencia');

        }

        

    }
}