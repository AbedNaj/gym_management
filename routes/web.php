<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Models\registration;
use Illuminate\Support\Facades\Route;


// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Global utility routes
Route::get('/change/{lang}', LanguageController::class)->name('lang.change');

// Guest-only routes
Route::middleware('guest')->group(function () {
    // Authentication
    Route::controller(SessionController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

    // Registration
    Route::controller(RegisterUserController::class)->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Admin panel
    Route::prefix('/admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Customers
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/customers', 'index')->name('customers.index');

            Route::post('/customers/create', 'store');
            Route::get('/customers/create', 'create')->name('customers.create');

            Route::patch('/customers/{customer}', 'update')->name('customers.update');
            Route::get('/customers/{customer}/edit', 'edit')->name('customers.edit')->can('update', 'customer');

            Route::delete('/customers/destroy/{customer}', 'destroy')->name('customers.delete')->can('delete', 'customer');

            Route::get('customers/search', 'search')->name('customers.search');
        });

        //plans 
        Route::controller(PlansController::class)->group(function () {

            Route::get('/plans', 'index')->name('plans.index');

            Route::post('/plans/create', 'store');
            Route::get('/plans/create', 'create')->name('plans.create');

            Route::patch('/plans/{plans}', 'update')->name('plans.update');
            Route::get('/plans/{plans}/edit', 'edit')->name('plans.edit')->can('update', 'plans');

            Route::delete('/plans/destroy/{plans}', 'destroy')->name('plans.delete')->can('delete', 'plans');

            Route::get('plans/search', 'search')->name('plans.search');
        });

        Route::controller(RegistrationController::class)->group(function () {


            Route::get('/registration', 'index')->name('registration.index');


            Route::get('/registration/show/{customer?}', 'show')->name(name: 'registration.show')->can('create', [registration::class, 'customer']);

            Route::get('/registration/registrations/{customer?}', 'showAll')->name(name: 'registration.showAll')->can('create', [registration::class, 'customer']);

            Route::post('/registration/create/{customer?}', 'store');
            Route::get('/registration/create/{customer?}', 'create')->name(name: 'registration.create')->can('create', [registration::class, 'customer']);



            Route::patch('/registration/{registration}', 'update')->name('registration.update');
            Route::get('/registration/{registration}/edit', 'edit')->name('registration.edit')->can('update', 'registration');

            Route::delete('/registration/destroy/{registration}', 'destroy')->name('registration.delete')->can('delete', 'Registration');
            Route::get('registration/search', 'search')->name('registration.search');
        });
    });
});
