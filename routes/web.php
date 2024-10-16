<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComprarEventoController;
use App\Http\Controllers\TransaccioneController;
use App\Http\Controllers\EntradasEventoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\MisEntradasController;
use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\TiposEntradaController;
use App\Http\Controllers\ParticipacioneController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\MisCertificadoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\TiposCompraController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\DiplomasUsuarioController;
use App\Models\TiposEntrada;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('eventos', EventoController::class)->middleware(['auth', 'verified']);
Route::resource('entradas-eventos', EntradasEventoController::class)->middleware(['auth', 'verified']);
Route::get('valida/{id?}', [EntradasEventoController::class,'ValidaEntrada'])->middleware(['auth', 'verified']);
Route::get('RegistraAsistencia/{id}/{a}', [EntradasEventoController::class,'RegistraAsistencia'])->middleware(['auth', 'verified']);
Route::get('download/{id}', [EntradasEventoController::class,'download'])->middleware(['auth', 'verified']);
Route::resource('ComprarEventos', ComprarEventoController::class)->middleware(['auth', 'verified']);
Route::resource('MisEntradas', MisEntradasController::class)->middleware(['auth', 'verified']);
Route::get('DownloadEntrada/{id}', [EntradasEventoController::class,'DownloadEntrada'])->middleware(['auth', 'verified']);
Route::resource('transacciones', TransaccioneController::class)->middleware(['auth', 'verified']);


Route::middleware(['auth', 'verified'])->group(function(){

    Route::resource('actividades', ActividadeController::class);
    Route::resource('participaciones', ParticipacioneController::class);
    //Route::resource('participaciones', TiposEntradaController::class);
    Route::resource('certificados', CertificadoController::class);
    Route::resource('compras', CompraController::class);
    Route::resource('miscertificados', MisCertificadoController::class);
    Route::resource('tipos-compras', TiposCompraController::class);
    Route::get('comprobante/{id}', [TransaccioneController::class,'comprobante'])->middleware(['auth', 'verified']);
    Route::get('/diploma', function () {
        return view('admin.participacione.diploma');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('DownloadDiploma/{id}', [DiplomasUsuarioController::class, 'DownloadDiploma']);

    Route::resource('diplomas', DiplomaController::class);
    Route::get('CrearNomina/{id}', [DiplomaController::class, 'CrearNomina']);
    Route::resource('diplomas-usuarios', DiplomasUsuarioController::class);
    Route::get('publicar/{id}', [DiplomasUsuarioController::class, 'publicar']);

});



Route::get('comprar/{id}/{user_id}', [ComprarEventoController::class, 'comprar'])->middleware(['auth', 'verified']);
//Route::get('generateCustomQRCode', [EntradasEventoController::class,'generateCustomQRCode'])->middleware(['auth', 'verified']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('generate/UUID', [EventoController::class, 'generate_UUID']);