<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemoriasRam;
use DB;

class MemoriaRamController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'capacidadmemor' => 'required',
            'tecnologia' => 'required',
            'velocidadRAM' => 'required'
            ]);
        $newram = new MemoriasRam;
        $newram->capacidad = $request->capacidadmemor;
        $newram->tecnologia = $request->tecnologia;
        $newram->velocidad = $request->velocidadRAM;
        $newram->save();
        return redirect('/direccion_ip')->with('ip','ok');
    }

    public function get_ram(){

        $allram = \DB::table('memoria_ram')
        ->get();
        return response()->json($allram);
    }
}
