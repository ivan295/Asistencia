<?php
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EstadoRegistroController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Type_usersController;
use App\Http\Controllers\DireccionIpController;
use App\Http\Controllers\EstadoAsistenciaController;


 Route::get('/', function () {
    return Redirect::to('/login');  
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
// ------------------------ Edificio -----------------------
Route::get('/edificio', [BuildingController::class,'index']);
Route::post('/edificio_create',[BuildingController::class,'store']);
Route::post('/edificio_edit/{id}',[BuildingController::class, 'edit']);
Route::put('/edificio_update/{id}',[BuildingController::class, 'update']);
Route::delete('/edificio_remove/{id}',[BuildingController::class, 'destroy']);

// -------------------------- departamento ----------------------------
Route::get('/departamento', [DepartmentController::class,'index']);
Route::post('/departamento_create',[DepartmentController::class,'store']);
Route::post('/departamento_edit/{id}',[DepartmentController::class, 'edit']);
Route::put('departamento_update/{id}',[DepartmentController::class, 'update']);
Route::delete('/departamento_remove/{id}',[DepartmentController::class, 'destroy']);

// -------------------------- Asignar direccion ip --------------------------
// Route::get('/direccion_ip', [DireccionIpController::class,'index']);
// Route::post('/direccion_ip_create',[DireccionIpController::class,'store']);
// Route::post('/direccion/{id}/edit',[DireccionIpController::class, 'edit']);
// Route::put('/direccion_update/{id}',[DireccionIpController::class, 'update']);
// Route::delete('/direccion_ip_remove/{id}',[DireccionIpController::class, 'destroy']);
Route::resource('direccion_ip', DireccionIpController::class);

// ---------------------------- tipo de usuario ----------------------------
Route::get('/type_users', [Type_usersController::class,'index']);
Route::post('/type_users_create',[Type_usersController::class,'store']);
Route::post('/type_users_edit/{id}',[Type_usersController::class, 'edit']);
Route::put('/type_users_update/{id}',[Type_usersController::class, 'update']);
Route::delete('/type_users_remove/{id}',[Type_usersController::class, 'destroy']);

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
//------------------------------ reporte de asistencia ------------------------------------
Route::get('/report_index',[ReportController::class,'index']);
Route::post('/report_search', [ReportController::class,'search']);

// --------------------------- aprobar asistencia -----------------------------
Route::get('/estado_registro_view', [EstadoRegistroController::class,'index'] );
Route::post('/estado_registro_edit/{id}', [EstadoRegistroController::class,'edit'] );
Route::post('/estado_registro_update/{id}',[EstadoRegistroController::class, 'update']);
Route::get('/aprobar_lote',[EstadoRegistroController::class,'lote_index'] );
Route::post('/array_check',[EstadoRegistroController::class,'arrayCheck']);

// ---------------------------- registros ----------------------------------
Route::get('/ver_asistencia',[AsistenciaController::class,'VerAsistencia']);

});
