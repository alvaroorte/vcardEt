<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// RUTAS PARA PERSONAS
route::get('/listPeople', [PersonasController::class, 'listPeople'])->name('listPeople')->middleware('can:persona.list');
route::get('/formPerson', [PersonasController::class, 'formPerson'])->name('formPerson')->middleware('can:persona.form');
route::get('/formPersonEdit/{idPerson}', [PersonasController::class, 'formPersonEdit'])->name('formPersonEdit')->middleware('can:persona.formEdit');
route::post('/createPerson', [PersonasController::class, 'createPerson'])->name('createPerson')->middleware('can:persona.create');
route::post('/editPerson', [PersonasController::class, 'editPerson'])->name('editPerson')->middleware('can:persona.formEdit');;
route::get('/deletePerson/{idPerson}', [PersonasController::class, 'deletePerson'])->name('deletePerson')->middleware('can:persona.delete');
route::get('/infoPerson/{identificador}', [PersonasController::class, 'infoPerson'])->name('infoPerson');

// RUTAS PARA EMPRESA
route::get('/listEmpresa', [EmpresaController::class, 'listEmpresa'])->name('listEmpresa')->middleware('can:user');
route::get('/formEmpresa', [EmpresaController::class, 'formEmpresa'])->name('formEmpresa')->middleware('can:admin');
route::get('/formEmpresaEdit/{idEmpresa}', [EmpresaController::class, 'formEmpresaEdit'])->name('formEmpresaEdit')->middleware('can:admin');
route::post('/createEmpresa', [EmpresaController::class, 'createEmpresa'])->name('createEmpresa')->middleware('can:admin');
route::post('/editEmpresa', [EmpresaController::class, 'editEmpresa'])->name('editEmpresa')->middleware('can:admin');;
route::get('/deleteEmpresa{idEmpresa}', [EmpresaController::class, 'deleteEmpresa'])->name('deleteEmpresa')->middleware('can:admin');

// RUTAS PARA EMPRESA
Route::resource('users', UserController::class)->names('users')->middleware('can:admin');


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
