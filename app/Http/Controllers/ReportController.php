<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reloj;
use PDF;
use Illuminate\Support\Facades\Auth;
use DB;
use DateTime;
use DateTimeZone;
use DOMDocument;

class ReportController extends Controller
{
    public function index(){
        return view('adminlte::reportview');
    }

    public function search(Request $request){
        $data = new DateTime("now", new DateTimeZone('America/Guayaquil'));
        $fecha = $data->format('Y_m_d');

        $fdesde = $request->desde;
        $fhasta = $request->hasta;
        $data = \DB::table('clock')
        ->join('modality as mod1','mod1.id','=','clock.id_modalidad_ingreso')
        ->join('modality as mod2','mod2.id','=','clock.id_modalidad_reanudacion')
        ->join('users','users.id','=','clock.id_user')
        ->select('clock.*','mod1.descripcion as modalidad_ingreso','mod2.descripcion as modalidad_reanudacion','users.name as nombre','users.apellido as apellido','users.cedula as cedula')
        ->where('id_user','=', Auth::user()->id)
        ->where('clock.fecha','>=',$request->desde)
        ->where('clock.fecha','<=',$request->hasta)
        ->get();

        return PDF::loadView('adminlte::pdf_view',compact('data','fdesde','fhasta'))
        ->setPaper('a4', 'landscape')
        ->download('registro_asistencia_'.$fecha.'.pdf');
        // dd($data);
    }
}
