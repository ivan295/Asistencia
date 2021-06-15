<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelos;
use DB;

class ModeloController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'modelo' => 'required|unique:modelos,descripcion'
            ]);
        $newmodel = new Modelos;
        $newmodel->descripcion = $request->modelo;
        $newmodel->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }
    public function get_modelos(){
        $allmodelos = \DB::table('modelos')
        ->get();
        return response()->json($allmodelos);
    }
}