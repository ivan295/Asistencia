<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use DB;

class BuildingController extends Controller
{
    public function index(){
        $edif = \DB::table('building')
        ->where('building.estado_eliminado','!=','TRUE')
        ->get();
        return view('adminlte::edificio.newEdificio',compact('edif'));
    }

    public function store(Request $request){
        $newedificio = new Building;
        $newedificio->descripcion = $request->edificio;
        $newedificio->direccion = $request->direccion;
        $newedificio->estado_eliminado = 'False';
        $newedificio->save();
        return redirect('/edificio');

    }
    public function edit($id){
        $editedif= Building::findOrFail($id);
        return view('adminlte::edificio.editEdificio',compact('editedif'));
    }
    public function update(Request $request,$id){

        dd($request);
        $updateedif = Building::findOrFail($id);
        $updateedif->descripcion = $request->edificio;
        $updateedif->observacion = $request->direccion;
        $updateedif->save();
        return redirect('/edificio');
    }
    public function destroy($id){
        $borra = Building::findOrFail($id);
        $borra->estado_eliminado = 'True';
        $borra->save();
        return redirect('/edificio')->with('eliminar','ok'); //envio variables de sesion, necesita dos parametros, primero el nombre de la variable y segundo el mensaje

    }
}
