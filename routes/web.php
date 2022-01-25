<?php

use App\Http\Controllers\proyectoController;
use Illuminate\Support\Facades\Route;

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
 
/*Route::get('/Consult', function () {
    return view('index');
})->name('Consult');*/

//ruta para mostrar registros
Route::get('/Consult', [proyectoController::class, 'index'])->name('Consult');

//ruta para guardar consulta
Route::post('/Consult', [proyectoController::class, 'store'])->name('Consult');

/*Route::get('/show', function () {
    return 'hola de nuevo saludos';
});*/

Route::get('/Consult/{id}', [proyectoController::class, 'show'])->name('consul-edit');
Route::patch('/Consult/{id}', [proyectoController::class, 'update'])->name('consul-update');//edit
Route::delete('/Consult/{id}', [proyectoController::class, 'destroy'])->name('consul-destroy');
