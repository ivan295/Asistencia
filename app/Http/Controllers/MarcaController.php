<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Marcas;

class MarcaController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'marca' => 'required|unique:marcas,descripcion'
            ]);
        $newmarca = new Marcas;
        $newmarca->descripcion = $request->marca;
        $newmarca->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function get_marcas(){

        $allmarcas = \DB::table('marcas')
        ->get();
        return response()->json($allmarcas);
    }
}
