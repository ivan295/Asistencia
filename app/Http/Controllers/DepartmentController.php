<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
use DB;

class DepartmentController extends Controller
{      

    public function index(){
        $alldepartment = \DB::table('department')
        ->join('building','building.id','=','department.id_edificio')
        ->join('direcciones','direcciones.id','=','department.id_direccion')
        ->select('department.id','department.descripcion','department.direccion','building.descripcion as edificio','direcciones.descripcion as direccion_inst')
        ->get();
        return view('adminlte::departamento.newdepartment',compact('alldepartment'));
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'departamento' => 'required',
            'rbox' => 'required',
            'edificio'=>'required'
            ]);
        
        $newdepartment = new Department;
        $newdepartment->descripcion = $request->departamento;
        $newdepartment->id_edificio = $request->edificio;
        if($request->rbox == 'si'){
            $newdepartment->id_direccion = $request->seldir;
        }else if($request->rbox == 'no'){
            $newdepartment->id_direccion = 1;
        }
        $newdepartment->direccion = $request->direccion_calle;
        $newdepartment->save();
        return redirect('/departamento')->with('departamento','ok');
    }

    public function edit($id){
        $editdepart=\DB::table('department')
        ->join('building','building.id','=','department.id_edificio')
        ->select('department.id','department.descripcion','department.direccion','building.descripcion as edificio')
        ->where('department.id','=',$id)
        ->get();

        // dd($editdepart);
        return view('adminlte::departamento.editdepartment',compact('editdepart'));
    }

    public function getdirec(){
        $dep = \DB::table('direcciones')
        ->where('estado_eliminado','!=','True')
        ->get();
        return response()->json($dep);
    }

    public function getdepart($varia){
        $dep = \DB::table('department')
        ->where('estado_eliminado','!=','True')
        ->where('id_edificio','=',$varia)
        ->get();
        return response()->json($dep);
    }
}
