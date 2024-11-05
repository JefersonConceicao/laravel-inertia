<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/users', [UsersController::class, 'index'])->name(name: 'users.index');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/store',[UsersController::class, 'store'])->name('users.store');
    Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/delete/{user}', [UsersController::class, 'destroy'])->name('users.delete');
});
