<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\CargosController;

use App\Http\Controllers\PaisesController;
use App\Http\Controllers\UsuariosController;

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

Route::resource('empleados', EmpleadosController::class);
Route::resource('proveedores', ProveedoresController::class);
Route::resource('cargos', CargosController::class);

Route::resource('paises', PaisesController::class);
Route::resource('usuarios', UsuariosController::class);
