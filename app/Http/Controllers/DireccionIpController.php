<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DireccionIP;
// use Illuminate\Http\Request;

class DireccionIpController extends Controller
{
    public function index(){
        $ip = \DB::table('tableip')
        ->join('building','building.id','=','tableip.id_edificio')
        ->join('department','department.id','=','tableip.id_departamento')
        ->select('tableip.*','building.descripcion as edificio','department.descripcion as departamento')
        ->where('tableip.estado_eliminado','=','FALSE')
        ->get();

        // dd($ip);

        return view('adminlte::direccionip.newIP',compact('ip'));
    }

    public function store(Request $request){

        $request->validate([
            'ip'=>'required|unique:tableip,ip',
            'edificio'=>'required',
            'departamento'=>'required'
            ]);

        $newip = new DireccionIP;
        $newip->ip = $request->ip;
        $newip->id_edificio = $request->edificio;
        $newip->id_departamento = $request->departamento;
        $newip->observacion = $request->observacion;
        $newip->estado_eliminado = 'FALSE';
        $newip->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function edit($id){
         $edtip = \DB::table('tableip')
        ->join('building','building.id','=','tableip.id_edificio')
        ->join('department','department.id','=','tableip.id_departamento')
        ->select('tableip.id','tableip.ip','tableip.observacion','building.descripcion as edificio','department.descripcion as departamento')
        ->where('tableip.id','=',$id)
        ->get();
        return view('adminlte::direccionip.direccionipEdit',compact('edtip'));
    }

    public function update(Request $request,$id){
        // dd($request);
        $request->validate([
            'ip'=>'required|unique:tableip,ip', //unique:nombre_tabla,campo
            'edificio'=>'required',
            'departamento'=>'required'
        ]);
        $upd = DireccionIP::findOrFail($id);
        $upd->ip=$request->ip;
        $upd->id_edificio=$request->edificio;
        $upd->id_departamento = $request->departamento;
        $upd->observacion = $request->observacion;
        $upd->estado_eliminado = 'FALSE';
        $upd->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function destroy($id){
        $delip= DireccionIP::findOrFail($id);
        $delip->estado_eliminado='True';
        $delip->save();
        return redirect('/direccion_ip')->with('eliminar','ok');
    }
}
