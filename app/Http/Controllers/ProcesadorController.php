<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procesadores;
use DB;

class ProcesadorController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'nameprocesador'=>'required',
            'frecuencia' => 'required',
            'generacion' => 'required'
            ]);
        $newproc = new Procesadores;
        $newproc->nombre = $request->nameprocesador;
        $newproc->frecuencia = $request->frecuencia;
        $newproc->generacion = $request->generacion;
        $newproc->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function get_procesador(){
        $allprocesor = \DB::table('procesadores')
        ->get();
        return response()->json($allprocesor);
    }
}
