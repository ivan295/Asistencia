<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Direccion;

class DireccionController extends Controller
{
    public function index(){
        $ndirec= \DB::table('direcciones')
        ->join('building','building.id','=','direcciones.id_edificio')
        ->select('direcciones.descripcion','building.descripcion as edificio')
        ->where('direcciones.estado_eliminado','=','FALSE')
        ->get();
        return view('adminlte::direcciones.newDireccion',compact('ndirec'));
    }

    public function store(Request $request){

        // dd($request);
        $request->validate([
            'direccion' => 'required',
            'edificio' => 'required'
            ]);

        $newdire = new Direccion;
        $newdire->descripcion = $request->direccion;
        $newdire->id_edificio = $request->edificio;
        $newdire->estado_eliminado = 'False';
        $newdire->save();
        return redirect('/direccion')->with('direccion','ok');
    }

    public function getdirec(){
        $direcc = \DB::table('direcciones')
        ->where('estado_eliminado','!=','FALSE')
        ->get();
        return response()->json($direcc);
    }

    public function getdireccion($varia){
        $direcc = \DB::table('direcciones')
        ->where('estado_eliminado','=','FALSE')
        ->where('id_edificio','=',$varia)
        ->get();
                // dd($direcc);
        return response()->json($direcc);
    }
    
}
