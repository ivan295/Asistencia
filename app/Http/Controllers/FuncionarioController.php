<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionarios;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FuncionarioController extends Controller
{

    public function index(){
        $id=Auth::user()->id;
        $editar_usuario = User::find($id);
         return view('adminlte::funcionario', compact('editar_usuario'));

         
    }
    public function edit()
    {   
        $id=Auth::user()->id;
        $editar_usuario = User::find($id);
         return view('adminlte::funcionario', compact('editar_usuario'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'cedula' => 'required|max:10',
            'edificio'=>'required',
            'departamento'=>'required',
            'password' =>'required'
            ]);
        $id=Auth::user()->id;
        $edituser = User::find($id);
        $edituser->name = $request->nombre;
        $edituser->apellido = $request->apellido;
        $edituser->cedula = $request->cedula;
        $edituser->direccion = $request->direccion;
        $edituser->sexo = $request->genero;
        $edituser->id_edificio = $request->edificio;
        $edituser->id_departamento = $request->departamento;
        $edituser->password= bcrypt($request->password);
        $edituser->save();
        // return view('adminlte::home')->with('success','Funcionario Guardado con éxito');
        return redirect('/home')->with('success','Funcionario Guardado con éxito');
    } 
}
