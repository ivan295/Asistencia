<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterStatus;
use DB;
use App\Models\Reloj;
use Illuminate\Support\Facades\Auth;

class EstadoRegistroController extends Controller
{
    public function index(){

        $idtipo = Auth::user()->id_departamento;

        // $idtipofun = 0;
        // || Auth::user()->id_tipouser == 3
        if(Auth::user()->id_tipouser == 2){

            $idtipofun = 3;
            $query2 = \DB::table('clock')
            ->join('users','users.id','=','clock.id_user')
            ->join('register_status','register_status.id','=','clock.id_estado_registro')
            ->select('users.name as nombre','users.apellido as apellido','users.cedula as cedula','clock.fecha','clock.id')
            // ->where('users.id_departamento','=',$idtipo)
            ->where('users.id_tipouser','=', $idtipofun)
            ->where('users.id_direccion','=',2)
            ->where('clock.id_estado_registro','=',2)
            ->where('clock.id_estado_asistencia','=',4)
            ->get();
            return view('adminlte::estadoregistro',compact('query2'));

        }elseif( Auth::user()->id_tipouser == 3){
            $idtipofun = 4;
            $query2 = \DB::table('clock')
        ->join('users','users.id','=','clock.id_user')
        ->join('register_status','register_status.id','=','clock.id_estado_registro')
        ->select('users.name as nombre','users.apellido as apellido','users.cedula as cedula','clock.fecha','clock.id')
        ->where('users.id_departamento','=',$idtipo)
        ->where('users.id_tipouser','=', $idtipofun)
        ->where('clock.id_estado_registro','=',2)
        ->where('clock.id_estado_asistencia','=',4)
        ->get();
        // dd($query2);
        return view('adminlte::estadoregistro',compact('query2'));
        }

        
    }


    public function edit($id){
        $edt = \DB::table('clock')
        ->join('users','users.id','=','clock.id_user')
        ->join('modality as mod1','mod1.id','=','clock.id_modalidad_ingreso')
        ->join('modality as mod2','mod2.id','=','clock.id_modalidad_reanudacion')
        ->select('clock.*','mod1.descripcion as modalidad_ingreso','mod2.descripcion as modalidad_reanudacion','users.name as nombre','users.apellido as apellido','users.cedula as cedula')
        ->where('clock.id','=',$id)
        ->get();
        // dd($edt);
       
        return view('adminlte::estadoregistroEdit',compact('edt'));
    }

    public function update(Request $request,$id){
        $arg= Reloj::findOrFail($id);
        $arg->id_estado_registro = $request->estado;
        $arg->save();
        return redirect('/estado_registro_view');

    }

    public function lote_index(){
        $idtipo = Auth::user()->id_departamento;
        $idtipofun = 0;
        if(Auth::user()->id_tipouser == 2 || Auth::user()->id_tipouser == 3){
            $idtipofun = 4;
        }elseif(Auth::user()->id_tipouser == 2 || Auth::user()->id_tipouser == 3){
            $idtipofun = 3;
        }

        $query2 = \DB::table('clock')
        ->join('users','users.id','=','clock.id_user')
        ->join('register_status','register_status.id','=','clock.id_estado_registro')
        ->select('clock.id','users.name as nombre','users.apellido as apellido','users.cedula as cedula','clock.fecha','clock.id')
        ->where('users.id_departamento','=',$idtipo)
        ->where('users.id_tipouser','=', $idtipofun)
        ->where('clock.id_estado_registro','=','2')
        ->where('clock.id_estado_asistencia','=',4)
        ->get();
        return view('adminlte::aprobar_lote',compact('query2'));
    }

    public function arrayCheck(Request $request){

        $request->validate([
            'marcaciones' => 'required',
            ]);
        
        $cont = 0;
    	while($cont < count($request->marcaciones)){

        $upestado = Reloj::find($request->marcaciones[$cont]);
        $upestado->id_estado_registro = 1;
        $upestado->save();
        $cont = $cont + 1;
        }
        return redirect('/aprobar_lote')->with('marcar_lote','ok');
    }
}
