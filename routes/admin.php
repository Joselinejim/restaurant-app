<?php

use Illuminate\Support\Facades\Route;

// Controllers Admin
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Productos
        Route::resource('/products', ProductController::class);

        // Categorías
        Route::resource('/categories', CategoryController::class);

        // Usuarios
        Route::resource('/users', UserController::class);

        // Roles (para quitar el error "admin.roles.index")
        Route::resource('/roles', RoleController::class);
    });
