<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('modulos.users.Ingresar');
});
Route::get('Inicio', function () {
    return view('modulos.Inicio');
});
//Route::get('primer-Usuario', [UsuariosController::class, 'PrimerUsuario']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
//sucursales 
Route::get('Sucursales', [SucursalesController::class, 'index']);
Route::post('Sucursales', [SucursalesController::class, 'store']);
Route::get('Editar-Sucursal/{id_sucursal}', [SucursalesController::class, 'edit']);
Route::put('Actualizar-Sucursal', [SucursalesController::class, 'update']);
Route::get('Cambiar-Estado-Sucursal/{estado}/{id_sucursal}', [SucursalesController::class, 'CambiarEstado']);

//usuarios
Route::get('Mis-Datos', function () {
    return view('modulos.users.Mis-Datos');
    
});
Route::post('Mis-Datos', [UsuariosController::class, 'AtualizarMisDatos']);
Route::get('Usuarios', [UsuariosController::class, 'index']);
Route::post('Usuarios', [UsuariosController::class, 'store']);
Route::get('Editar-Usuario/{id}', [UsuariosController::class, 'edit']);
Route::put('Actualizar-Usuario', [UsuariosController::class, 'update']);
//Route::get('Cambiar-Estado-Usuario/{estado}/{id}', [UsuariosController::class, 'CambiarEstado']);
//Route::get('Cambiar-Estado-Usuario/{estado}/{id}', [UsuariosController::class, 'CambiarEstado']);

//vehiculos
Route::get('vehiculos', [VehiculoController::class, 'index']);
Route::post('vehiculos', [VehiculoController::class, 'store']);
Route::get('Editar-Vehiculo/{id}', [VehiculoController::class, 'edit']);
Route::put('Actualizar-Vehiculo', [VehiculoController::class, 'update']);
Route::get('Cambiar-Estado-Vehiculo/{estado}/{id}', [VehiculoController::class, 'CambiarEstado']);
//Route::get('Cambiar-Estado-Vehiculo/{estado}/{id}', [VehiculoController::class, 'CambiarEstado']);
