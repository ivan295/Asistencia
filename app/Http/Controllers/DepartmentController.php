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
        ->select('department.id','department.descripcion','department.direccion','department.created_at','building.descripcion as edificio')
        ->get();
        return view('adminlte::departamento.newdepartment',compact('alldepartment'));
    }

    public function store(Request $request){
        $request->validate([
            'departamento' => 'required',
            'edificio'=>'required'
            ]);
        $newdepartment = new Department;
        $newdepartment->descripcion = $request->departamento;
        $newdepartment->id_edificio = $request->edificio;
        $newdepartment->direccion = $request->direccion;
        $newdepartment->save();
        return redirect('/departamento');
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
}