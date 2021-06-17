<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DireccionIP;
use App\Models\TableEquipo;

class NewEquipoController extends Controller
{

    public function index(){
        return view('adminlte::direccionip.newEquipo');
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'ip'=>'required|unique:tableip,ip',
            'edificio'=>'required',
            'seldep'=>'required',
            'selmarca'=> 'required',
            'selmodelo'=> 'required',
            'selprocesador'=>'required',
            'selram'=>'required',
            'selalmacenamiento'=>'required',
            'espacioalm'=>'required',
            'selso'=>'required',
            'selresponsable'=>'required',
            'selestado'=>'required'
            ]);
       
        $newequipo = new TableEquipo;
        $newequipo->id_departamento = $request->seldep;
        $newequipo->id_marca = $request->selmarca;
        $newequipo->id_modelo = $request->selmodelo;
        $newequipo->id_procesador = $request->selprocesador;
        $newequipo->id_memoria = $request->selram;
        $newequipo->almacenamiento = $request->selalmacenamiento;
        $newequipo->espacio_almacenamiento = $request->espacioalm;
        $newequipo->id_sistemaOperativo = $request->selso;
        $newequipo->id_responsable = $request->selresponsable;
        $newequipo->estado_equipo = $request->selestado;
        $newequipo->nombre_equipo = $request->nombreequipo;
        $newequipo->cod_cpu = $request->codcpu;
        $newequipo->tipo_equipo = $request->tipoequipo;
        $newequipo->observacion = $request->observacion;
        $newequipo->estado_eliminado = 'FALSE';
        $newequipo->save();

        $newip = new DireccionIP;
        $newip->ip = $request->ip;
        $newip->id_edificio = $request->edificio;
        $newip->id_equipo = $newequipo->id;
        $newip->estado_eliminado = 'FALSE';
        $newip->save();

        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function createEred(Request $request){
        // dd($request);
        $newe = new TableEquipo;
        $newe->id_departamento = $request->seldep;
        $newe->nombre_equipo = $request->nombreequipo;
        $newe->estado_equipo = $request->selestado;
        $newe->tipo_equipo = $request->tipoequipo;
        $newe->estado_eliminado = 'FALSE';
        $newe->save();

        $newip = new DireccionIP;
        $newip->ip = $request->ip;
        $newip->id_edificio = $request->edificio;
        $newip->id_equipo = $newe->id;
        $newip->estado_eliminado = 'FALSE';
        $newip->save();

        return redirect('/direccion_ip')->with('equipo','ok');

    }
}
