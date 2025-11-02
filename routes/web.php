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

    // Rutas para Conductores
    Route::resource('conductores', ConductorController::class);
    Route::post('conductores/{conductor}/cambio-estado', [ConductorController::class, 'cambioEstado'])->name('conductores.cambio-estado');

    Route::resource('contratos', ContratoController::class);
    Route::post('contratos/{contrato}/cambio-estado', [ContratoController::class, 'cambioEstado'])->name('contratos.cambio-estado');

    Route::resource('empresas', EmpresaController::class);
    Route::post('empresas/{empresa}/cambio-estado', [EmpresaController::class, 'cambioEstado'])->name('empresas.cambio-estado');

    Route::resource('licencias', LicenciaController::class);
    Route::post('licencias/{licencia}/cambio-estado', [LicenciaController::class, 'cambioEstado'])->name('licencias.cambio-estado');

    Route::resource('marcas', MarcaController::class);
    Route::post('marcas/{marca}/cambio-estado', [MarcaController::class, 'cambioEstado'])->name('marcas.cambio-estado');

    Route::resource('recarga_combustibles', Recarga_CombustibleController::class);
    Route::post('recarga_combustibles/{recarga_combustible}/cambio-estado', [Recarga_CombustibleController::class, 'cambioEstado'])->name('recarga_combustibles.cambio-estado');

    Route::resource('rutas', RutaController::class);
    Route::post('rutas/{ruta}/cambio-estado', [RutaController::class, 'cambioEstado'])->name('rutas.cambio-estado');

    Route::resource('tipo_vehiculos', Tipo_VehiculoController::class);
    Route::post('tipo_vehiculos/{tipo_vehiculo}/cambio-estado', [Tipo_VehiculoController::class, 'cambioEstado'])->name('tipo_vehiculos.cambio-estado');

    Route::resource('vehiculos', VehiculoController::class);
    Route::post('vehiculos/{vehiculo}/cambio-estado', [VehiculoController::class, 'cambioEstado'])->name('vehiculos.cambio-estado');

    Route::resource('viajes', ViajeController::class);
    Route::post('viajes/{viaje}/cambio-estado', [ViajeController::class, 'cambioEstado'])->name('viajes.cambio-estado');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});