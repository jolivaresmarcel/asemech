<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComprarEventoController;
use App\Http\Controllers\EntradasEventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('eventos', EventoController::class)->middleware(['auth', 'verified']);
Route::resource('entradas-eventos', EntradasEventoController::class)->middleware(['auth', 'verified']);
Route::get('valida/{id?}', [EntradasEventoController::class,'ValidaEntrada'])->middleware(['auth', 'verified']);
Route::get('download/{id}', [EntradasEventoController::class,'download'])->middleware(['auth', 'verified']);

Route::resource('ComprarEventos', ComprarEventoController::class)->middleware(['auth', 'verified']);
//Route::get('comprar', [ComprarEventoController::class, 'comprar'])->middleware(['auth', 'verified']);
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