<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DireccionIP;

class NewEquipoController extends Controller
{
    public function store(Request $request){

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

        $newip = new DireccionIP;
        $newip->ip = $request->ip;
        $newip->id_edificio = $request->edificio;
        $newip->id_departamento = $request->seldep;
        $newip->id_marca = $request->selmarca;
        $newip->id_modelo = $request->selmodelo;
        $newip->id_procesador = $request->selprocesador;
        $newip->id_memoria = $request->selram;
        $newip->almacenamiento = $request->selalmacenamiento;
        $newip->espacio_almacenamiento = $request->espacioalm;
        $newip->id_sistemaOperativo = $request->selso;
        $newip->id_responsable = $request->selresponsable;
        $newip->estado_equipo = $request->selestado;
        $newip->nombre_equipo = $request->nombreequipo;
        $newip->cod_cpu = $request->codcpu;
        $newip->observacion = $request->observacion;
        $newip->estado_eliminado = 'FALSE';
        $newip->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }
}
