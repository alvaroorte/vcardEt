<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PruebasController;


route::get('mensaje', [PruebasController::class, 'mensaje']);
route::get('mensaje/{nombre}', [PruebasController::class, 'mensajeConNombre']);
route::get('post/{n}/{m}', [PruebasController::class, 'post']);
route::get('salir', [PruebasController::class, 'salir'])->name('salir');

route::get('vb', [PruebasController::class, 'vb'])->name('vb');

route::get('formulario', [PersonasController::class, 'formulario'])->name('formulario');
route::post('guardarPersona', [PersonasController::class, 'guardarPersona'])->name('guardarPersona');


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

Route::get('/ruta1', function () {
    return "Hello world";
});

Route::get('/ruta2', function () {
    $var1 = 4;
    $var2 = 6;
    return "los numeros son $var1 y $var2";
});

Route::get('/ruta2/{var1}/{var2}', function ($var1, $var2) {
    // $var1 = 4;
    // $var2 = 6;
    return "los numeros son $var1 y $var2";
});

// estos 2 son iguales
Route::get('/ruta3', function () {
    return redirect('ruta1');
});

Route::redirect('ruta3', 'ruta1');
 

Route::get('/ruta4', function () {
    return redirect('ruta2');
});

Route::redirect('ruta4', 'ruta2/1/2');