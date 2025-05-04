<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RelacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('estudiantes', EstudianteController::class);
Route::resource('cursos', CursoController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('certificados', CertificadoController::class);
Route::get('certificados/generar/{id}', [CertificadoController::class, 'generar'])->name('certificados.generar');
Route::get('consultas', [ConsultaController::class, 'index']);
Route::resource('relacion', RelacionController::class); 

Route::get('{id}', [RelacionController::class, 'certificado'])->where('id', '[a-f0-9]{64}');
