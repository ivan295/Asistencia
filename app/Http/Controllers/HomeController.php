<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = \DB::table('users')
        ->select('users.cedula')
        ->where('id','=',Auth::user()->id)
        ->get();
        foreach($query as $ced){
            $var = $ced->cedula;
        }
        
        if($var == NULL){
            return redirect('/funcionario_edit');
        }else{
            return view('adminlte::home');

        }
        

    }
}
