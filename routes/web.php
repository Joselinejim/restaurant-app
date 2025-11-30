<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cocina\CocinaOrderController;
use App\Http\Controllers\Mesero\MeseroOrderController;

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



// RUTAS MESERO
Route::middleware(['auth', 'role:mesero'])->prefix('mesero')->name('mesero.')->group(function () {

    // LISTADO DE ÓRDENES DEL MESERO
    Route::get('/orders', [App\Http\Controllers\Mesero\MeseroOrderController::class, 'index'])
        ->name('orders.index');

    // CREAR ORDEN
    Route::get('/orders/create', [App\Http\Controllers\Mesero\MeseroOrderController::class, 'create'])
        ->name('orders.create');

    // GUARDAR ORDEN
    Route::post('/orders', [App\Http\Controllers\Mesero\MeseroOrderController::class, 'store'])
        ->name('orders.store');

    // VER ORDEN
    Route::get('/orders/{order}', [App\Http\Controllers\Mesero\MeseroOrderController::class, 'show'])
        ->name('orders.show');

    // AGREGAR PRODUCTO A LA ORDEN
    Route::post('/orders/{order}/items', [App\Http\Controllers\Mesero\MeseroOrderController::class, 'addItem'])
        ->name('orders.addItem');
});




Route::middleware(['auth', 'role:cocina'])
    ->prefix('cocina')
    ->name('cocina.')
    ->group(function () {

        Route::get('/ordenes', [CocinaOrderController::class, 'index'])->name('ordenes.index');
        Route::post('/ordenes/{order}/estatus', [CocinaOrderController::class, 'updateStatus'])->name('ordenes.estatus');

    });
