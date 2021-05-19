<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reloj;
use PDF;
use Illuminate\Support\Facades\Auth;
use DB;

class ReportController extends Controller
{
    public function index(){
        return view('adminlte::reportview');
    }

    public function search(Request $request){
        
        $fdesde = $request->desde;
        $fhasta = $request->hasta;
        $data = \DB::table('clock')
        ->join('modality as mod1','mod1.id','=','clock.id_modalidad_ingreso')
        ->join('modality as mod2','mod2.id','=','clock.id_modalidad_reanudacion')
        ->select('clock.*','mod1.descripcion as modalidad_ingreso','mod2.descripcion as modalidad_reanudacion')
        ->where('id_user','=', Auth::user()->id)
        ->where('clock.fecha','>=',$request->desde)
        ->where('clock.fecha','<=',$request->hasta)
        ->get();
        $pdf = PDF::loadView('adminlte::pdf_view',compact('data','fdesde','fhasta'));
        return $pdf->download('pdf_file.pdf');
        // dd($data);
    }
}
