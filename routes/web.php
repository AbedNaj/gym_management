<?php

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login.form');
    Route::post('/login', [SessionController::class, 'store'])->name('login');

    Route::get('/register', [RegisterUserController::class, 'create'])->name('register.form');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register');
});

Route::middleware('auth')->group(function () {

    Route::delete('/logout', [SessionController::class, 'destroy']);

    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/admin/customers', function () {
        return view('admin.customers.index');
    });
});
