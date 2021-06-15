<?php
namespace App\Http\Controllers;
use DateTime;
use DateTimeZone;
use App\Models\Reloj;
use App\Models\Asistencia;
use App\Models\Ip_ingreso;
use App\Models\Ip_descanso;
use App\Models\Ip_reanudacion;
use App\Models\Ip_fin_jornada;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //para usar el Auth y traer el id del usuario logueado

class AsistenciaController extends Controller
{
    public function index(){
        // $query = \DB::table('reloj')
        // ->join('modalidad','modalidad.id','=','reloj.id_modalidad_ingreso')
        // ->select('reloj.*','modalidad.descripcion as modalidad_ingreso')
        // ->where('id_user','=', Auth::user()->id)
        // ->orderBy('id', 'desc')
        // ->get();
        // // -----------------------------
        // $datos = \DB::table('reloj')
        // ->join('modalidad','modalidad.id','=','reloj.id_modalidad_reanudacion')
        // ->select('reloj.*','modalidad.descripcion as modalidad_reanudacion')
        // ->where('id_user','=', Auth::user()->id)
        // ->orderBy('id', 'desc') 
        // ->get();      
        // return view('adminlte::asistencia', compact('query','datos')); 
        $query = \DB::table('clock')
        ->join('modality as mod1','mod1.id','=','clock.id_modalidad_ingreso')
        ->join('modality as mod2','mod2.id','=','clock.id_modalidad_reanudacion')
        ->select('clock.*','mod1.descripcion as modalidad_ingreso','mod2.descripcion as modalidad_reanudacion')
        ->where('clock.id_user','=', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
        // dd($query);
        return view('adminlte::register_asistencia',compact('query'));        
    }

    public function GetData(){
        $data = new DateTime("now", new DateTimeZone('America/Guayaquil'));
        $hoy = $data->format('Y-m-d');    
        $datos = \DB::table('clock')
        ->join('assistance_status','assistance_status.id','=','clock.id_estado_asistencia')
        ->select('clock.id','assistance_status.descripcion as estado')
        ->where('clock.id_user','=', Auth::user()->id)
        ->where('clock.fecha','=',$hoy)
        ->get();
        return response()->json($datos);
        // dd($datos);
        //return view('vendor.adminlte.asistencia', compact('datos'));  
    }

    public function modalidadData(){
        $mod = \DB::table('modality')
        ->where('modality.estado','=','True')
        ->get();
        return response()->json($mod);
    }

    public function store(Request $request){
    // $fecha = date("Y-m-d");
    $data = new DateTime("now", new DateTimeZone('America/Guayaquil'));
    $horaf = $data->format('H:i:s');
    $fecha = $data->format('Y-m-d');

        function getIP() {
            if (isset($_SERVER)) {
                if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];
                }else {
                    return $_SERVER['REMOTE_ADDR'];
                }
                }else {
                if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
                    return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
                }else {
                return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
                }
            }
        }
        
        $marc = new Reloj;
        // -------------ingreso-----------------
        if($request->btnregistro == "Ingreso"){
            $request->validate([
                'id_modalidad' => 'required|numeric',
                ]);

            $marc->fecha = $fecha;
            $marc->hora_ingreso = $horaf;
            $marc->id_modalidad_ingreso = $request->id_modalidad;
            $marc->id_estado_asistencia = 1;
            $marc->id_user = Auth::user()->id;
            $marc->id_modalidad_reanudacion = 3;
            $marc->id_estado_registro = 2;
            $marc->save();
            //ingreso de ip a tabla ip_ingreso
            $ip= new Ip_ingreso;
            $ip->fecha= $fecha;
            $ip->hora = $horaf;
            $ip->ip = getIP();
            // ------------ ingresar lugar ---------------
            $place = \DB::table('tableip')
            ->join('building','building.id','=','tableip.id_edificio')
            ->where('tableip.ip','=',getIP())
            ->select('tableip.ip','building.descripcion as edificio')
            ->first();
            if(empty($place)){
                $ip->lugar_marcacion = 'externa'; //fuera de la institucion
            }else{
                $ip->lugar_marcacion = $place->edificio; //dentro de la institucion
            }
            // ------------ fin de ingreso lugar ------------------
            $ip->id_reloj = $marc->id;
            $ip->save();
            return redirect('/asistencia')->with('marcar','ok');
        // -----------------descanso--------------------
        }elseif($request->btnregistro == "Descanso"){

            $marc= Reloj::find($request->id_reloj);
            $marc->hora_descanso = $horaf;
            $marc->id_estado_asistencia = 2;
            $marc->id_user = Auth::user()->id;
            $marc->save();
            //ingreso de ip a tabla ip_inicio_dscanso
            $ip= new Ip_descanso;
            $ip->fecha= $fecha;
            $ip->hora = $horaf;
            $ip->ip = getIP();
              // ------------ ingresar lugar ---------------
            $place = \DB::table('tableip')
            ->join('building','building.id','=','tableip.id_edificio')
            ->where('tableip.ip','=',getIP())
            ->select('tableip.ip','building.descripcion as edificio')
            ->first();
            if(empty($place)){
                $ip->lugar_marcacion = 'externa'; //fuera de la institucion
            }else{
                $ip->lugar_marcacion = $place->edificio; //dentro de la institucion
            }
            // ------------ fin de ingreso lugar ------------------
            $ip->id_reloj = $marc->id;
            $ip->save();
            return redirect('/asistencia')->with('marcar','ok');

        // ----------------reanudar---------------------
        }elseif($request->btnregistro == "Reanudar"){
            $request->validate([
                'id_modalidad' => 'required|numeric',
                ]);
            $marc= Reloj::find($request->id_reloj);
            $marc->hora_reanudacion = $horaf;
            $marc->id_modalidad_reanudacion = $request->id_modalidad;
            $marc->id_estado_asistencia = 3;
            $marc->id_user = Auth::user()->id;
            $marc->save();
            //ingreso de ip a tabla ip_reanudacion
            $ip= new Ip_reanudacion;
            $ip->fecha= $fecha;
            $ip->hora = $horaf;
            $ip->ip = getIP();
            // ------------ ingresar lugar ---------------
            $place = \DB::table('tableip')
            ->join('building','building.id','=','tableip.id_edificio')
            ->where('tableip.ip','=',getIP())
            ->select('tableip.ip','building.descripcion as edificio')
            ->first();
            if(empty($place)){
                $ip->lugar_marcacion = 'externa'; //fuera de la institucion
            }else{
                $ip->lugar_marcacion = $place->edificio; //dentro de la institucion
            }
            // ------------ fin de ingreso lugar ------------------
            $ip->id_reloj = $marc->id;
            $ip->save();
            return redirect('/asistencia')->with('marcar','ok');
        // ------------------finalizar-------------------
        }elseif($request->btnregistro == "Finalizado"){
            
            $marc= Reloj::find($request->id_reloj);
            $marc->hora_salida = $horaf;
            $marc->id_estado_asistencia = 4;
            $marc->id_user = Auth::user()->id;
            $marc->save();
            //ingreso de ip a tabla ip_fin_jornada
            $ip= new Ip_fin_jornada;
            $ip->fecha= $fecha;
            $ip->hora = $horaf;
            $ip->ip = getIP();
            // ------------ ingresar lugar ---------------
            $place = \DB::table('tableip')
            ->join('building','building.id','=','tableip.id_edificio')
            ->where('tableip.ip','=',getIP())
            ->select('tableip.ip','building.descripcion as edificio')
            ->first();
            if(empty($place)){
                $ip->lugar_marcacion = 'externa'; //fuera de la institucion
            }else{
                $ip->lugar_marcacion = $place->edificio; //dentro de la institucion
            }
            // ------------ fin de ingreso lugar ------------------
            $ip->id_reloj = $marc->id;
            $ip->save();
            return redirect('/asistencia')->with('marcar','ok');
        }
    }

    public function VerAsistencia(){

        return view('adminlte::misregistros');


    }


}
