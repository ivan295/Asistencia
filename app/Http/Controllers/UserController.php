<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('adminlte::user.newuser');
    }

    public function store(Request $request){
        dd($request);

    }
}
