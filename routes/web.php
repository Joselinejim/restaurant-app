<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página pública
Route::get('/', function () {
    return view('welcome');
});

// Dashboard normal (usuarios)
Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// IMPORTAMOS TODAS LAS RUTAS ADMIN
require __DIR__.'/admin.php';

// RUTA DE PRUEBA
Route::get('/prueba', function () {
    return "Ruta cargada correctamente ✔";
});

require __DIR__.'/auth.php';
