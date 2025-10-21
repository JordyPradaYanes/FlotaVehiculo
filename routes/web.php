<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\Recarga_CombustibleController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\Tipo_VehiculoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ViajeController;



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () { 

    Route::resource('conductores', ConductorController::class);
    Route::resource('contratos', ContratoController::class);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('licencias', LicenciaController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('recargas_combustible', Recarga_CombustibleController::class);
    Route::resource('rutas', RutaController::class);
    Route::resource('tipos_vehiculos', Tipo_VehiculoController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('viajes', ViajeController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});