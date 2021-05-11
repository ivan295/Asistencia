<?php
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\FuncionarioController;



 Route::get('/', function () {
    return Redirect::to('/login'); 
});
// -------------------- asistencia ---------------------------------
Route::get('/asistencia', [AsistenciaController::class, 'index']);
Route::get('/asistencia_boton', [AsistenciaController::class, 'GetData']);
Route::get('/modalidad_show', [AsistenciaController::class, 'modalidadData']);
Route::post('/asistencia_create', [AsistenciaController::class, 'store']);

// ----------------------- datos funcionario --------------------------
Route::get('/funcionario' , [FuncionarioController::class,'index']);
Route::get('/funcionario_edit',[FuncionarioController::class,'edit']);
Route::post('/funcionario_update',[FuncionarioController::class,'update']);
// -------------------------------user profile----------------------------
Route::get('/user_profile' , [FuncionarioController::class,'profile']); //ver datos
Route::post('/change_password' , [FuncionarioController::class,'change']);
Route::get('/user_profile_edit' , [FuncionarioController::class,'edit_profile']);
Route::post('/user_profile_update' , [FuncionarioController::class,'profile_update']);
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
        //Route::get('/link1', function ()    {
        //Uses Auth Middleware
        //});

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
