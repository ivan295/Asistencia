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
        // perfil del funcionario
    public function profile(){
        $perfil = \DB::table('users')
        ->join('departamento','departamento.id','=','users.id_departamento')
        ->join('edificio','edificio.id','=','users.id_edificio')
        ->select('users.*','edificio.descripcion as edificio','departamento.descripcion as departamento')
        ->where('users.id','=', Auth::user()->id)
        ->get();
        return view('adminlte::profile', compact('perfil'));

    }
    public function change(Request $request){
        $id=Auth::user()->id;
        $editpass= User::find($id);
        $editpass->password = bcrypt($request->newpassword);
        $editpass->save();
        return redirect('/user_profile');
    }

    public function edit_profile(){
        $perfil_edit = \DB::table('users')
        ->join('departamento','departamento.id','=','users.id_departamento')
        ->join('edificio','edificio.id','=','users.id_edificio')
        ->select('users.*','edificio.descripcion as edificio','departamento.descripcion as departamento')
        ->where('users.id','=',Auth::user()->id)
        ->get();
        // dd($perfil_edit);
        return view('adminlte::edit_profile',compact('perfil_edit'));

    }
    public function profile_update(Request $request){
        
        $request->validate([
            'nombre' => 'required',
            'apellido'=>'required',
            'cedula'=>'required|max:10',
            'genero'=>'required',
            'id_edificio'=>'required',
            'id_departamento'=>'required'  
            ]);
        $id=Auth::user()->id;
        $edit_data= User::find($id);
        $edit_data->name = $request->nombre;
        $edit_data->apellido = $request->apellido;
        $edit_data->cedula = $request->cedula;
        $edit_data->direccion = $request->direccion;
        $edit_data->sexo = $request->genero;
        $edit_data->id_edificio = $request->id_edificio;
        $edit_data->id_departamento = $request->id_departamento;
        $edit_data->save();
        return redirect('/user_profile'); 
    }
}
