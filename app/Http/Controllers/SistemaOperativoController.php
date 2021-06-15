<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SistemasOperativos;
use DB;

class SistemaOperativoController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'sistemaO' => 'required|unique:sistemas_operativos,nombre'
        ]);
        $newso= new SistemasOperativos;
        $newso->nombre = $request->sistemaO;
        $newso->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function get_so(){
        $allso = \DB::table('sistemas_operativos')
        ->get();
        return response()->json($allso);
    }
}
