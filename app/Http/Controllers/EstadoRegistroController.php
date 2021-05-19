<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterStatus;
use DB;
use Illuminate\Support\Facades\Auth;

class EstadoRegistroController extends Controller
{
    public function index(){

        $idtipo = Auth::user()->id_departamento;
        $idtipofun = 0;
        if(Auth::user()->id_tipouser == 2 || Auth::user()->id_tipouser == 3){
            $idtipofun = 4;
        }elseif(Auth::user()->id_tipouser == 2 || Auth::user()->id_tipouser == 3){
            $idtipofun = 3;
        }

        $query2 = \DB::table('clock')
        ->join('users','users.id','=','clock.id_user')
        ->join('assistance_status','assistance_status.id','=','clock.id_estado_asistencia')
        ->select('users.name as nombre','users.apellido as apellido','users.cedula as cedula')
        // ->where('users.id_departamento','=',$idtipo)
        // ->where('users.id_tipouser','=', $idtipofun)
        ->get();

        dd($query2);

        // $query = \DB::table('users')
        // ->join('users','users.id','=','clock.id_users')
        // ->select('users.name','users.apellido','users.cedula')
        // ->where('users.id_departamento','=',$idtipo)
        // ->where('users.id_tipouser','=', $idtipofun)
        // ->get();

        return view('adminlte::estadoregistro',compact);
    }
}
