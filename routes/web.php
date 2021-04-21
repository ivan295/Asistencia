<?php
use App\Http\Controllers\AsistenciaController;




 Route::get('/', function () {
    return view('welcome');
});

Route::get('/asistencia', [AsistenciaController::class, 'index']);
Route::get('/asistencia_boton', [AsistenciaController::class, 'GetData']);
Route::get('/modalidad_show', [AsistenciaController::class, 'modalidadData']);
Route::post('/asistencia_create', [AsistenciaController::class, 'store']);


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
        //Route::get('/link1', function ()    {
        //Uses Auth Middleware
        //});

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
