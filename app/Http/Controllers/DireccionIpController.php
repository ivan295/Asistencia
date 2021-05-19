<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DireccionIP;

class DireccionIpController extends Controller
{
    public function index(){
        $ip = \DB::table('tableip')
        ->join('building','building.id','=','tableip.id_edificio')
        ->select('tableip.*','building','building.descripcion as edificio')
        ->get();

        return view('adminlte::direccionip.newIP',compact('ip'));
    }

    public function store(Request $request){

        $newip = new DireccionIP;
        $newip->ip = $request->ip;
        $newip->id_edificio = $request->edificio;
        $newip->observacion = $request->observacion;
        $newip->save();
        return redirect('/direccion_ip');
    }

}
