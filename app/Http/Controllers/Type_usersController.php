<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeUsers;
use DB;

class Type_usersController extends Controller
{
    public function index(){
        $typeusers = \DB::table('type_users')
        ->get();
        return view('adminlte::newtypeuser',compact('typeusers'));
    }

    public function store(Request $request){
        $newtipo = new TypeUsers;
        $newtipo->descripcion = $request->tipo;
        $newtipo->save();
        return redirect('/type_users');
    }

    public function edit($id){
        $tipo = TypeUsers::FindOrFail($id);
        return view('adminlte::editTypeuser',compact('tipo'));
    } 

    public function gettipoUsers(){
        $alltip = \DB::table('type_users')
        ->where('id','!=',1)
        ->get();
        return response()->json($alltip);
    }
}