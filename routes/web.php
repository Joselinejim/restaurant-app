<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Rutas necesarias para quitar el error
    Route::resource('/admin/products', \App\Http\Controllers\Admin\ProductController::class)
        ->names('admin.products');

    Route::resource('/admin/categories', \App\Http\Controllers\Admin\CategoryController::class)
        ->names('admin.categories');

    Route::resource('/admin/users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');
});

Route::get('/prueba', function () {
    return "Ruta cargada correctamente ✔";
});



require __DIR__.'/auth.php';
