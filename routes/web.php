<?php

use App\Http\Controllers\EmailVerify;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\FreezeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\ResetPassword;
use App\Models\debts;
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

    // forgotPassword

    Route::controller(ForgotPassword::class)->group(function () {

        Route::get('/forgot-password', 'create')->name('forgot');
        Route::post('/forgot-password', 'store');
    });

    // Reser Password
    Route::controller(ResetPassword::class)->group(function () {

        Route::get('/reset-password/{token}', 'create')->name('password.reset');
        Route::post('/reset-password', 'store')->name('password.update');
    });
});

Route::middleware(['auth'])->group(function () {
    // Email Verify 

    Route::controller(EmailVerifyController::class)->group(function () {
        Route::get('/email/verify', 'verifyNotice')->name('verification.notice');

        Route::get('/email/verify/{id}/{hash}', 'verifyEmail')->middleware(['signed'])->name('verification.verify');


        Route::post('/email/verification-notification', 'verifyNotification')->middleware(['throttle:6,1'])->name('verification.send');
    });

    // Logout
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});


// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {




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
        // Registrations
        Route::controller(RegistrationController::class)->group(function () {


            Route::get('/registration', 'index')->name('registration.index');


            Route::get('/registration/show/{customer?}', 'show')->name(name: 'registration.show')->can('create', [registration::class, 'customer']);

            Route::get('/registration/registrations/{customer?}', 'showAll')->name(name: 'registration.showAll')->can('create', [registration::class, 'customer']);

            Route::post('/registration/create/{customer?}', 'store')->can('create', [registration::class, 'customer']);
            Route::get('/registration/create/{customer?}', 'create')->name(name: 'registration.create')->can('create', [registration::class, 'customer']);


            Route::patch('/registration/{registration}', 'update')->name('registration.update')->can('update', 'registration');
            Route::get('/registration/{registration}/edit', 'edit')->name('registration.edit')->can('update', 'registration');

            Route::delete('/registration/destroy/{registration}', 'destroy')->name('registration.delete')->can('delete', 'Registration');
            Route::get('registration/search', 'search')->name('registration.search');


            // statistics :

            Route::get('registration/statistics/active', 'active')->name('registration.statistics.active');
            Route::get('registration/statistics/expired', 'expired')->name('registration.statistics.expired');
            Route::get('registration/statistics/expired-today', 'expiredToday')->name('registration.statistics.expiredToday');
        });

        //freeze

        Route::controller(FreezeController::class)->group(function () {
            Route::get('/registration/freezes', 'index')->name('freeze.index');

            Route::get('/registration/freeze/{registration}', 'create')->name('freeze.create')->can('update', 'registration');
            Route::post('/registration/freeze/{registration}', 'store');

            Route::get('/registration/freeze/show/{freeze}', 'show')->name('freeze.show')->can('view', 'freeze');

            Route::patch('/registration/freeze/{freeze}', 'update')->name('freeze.update');
        });
        // Debts
        Route::controller(DebtsController::class)->group(function () {


            Route::get('/debt', 'index')->name('debts.index');


            Route::get('/debt/show/{customer?}', 'show')->name(name: 'debt.show')->can('view', [debts::class, 'customer']);

            Route::get('debt/debts/{customer}', 'showAll')->name(name: 'debt.showAll')->can('view', [debts::class, 'customer']);

            Route::post('/debt/create/{customer}', 'store')->name('debt.store')->can('create', [debts::class, 'customer']);
            Route::get('/debt/create/{customer}', 'create')->name(name: 'debt.create')->can('create', [debts::class, 'customer']);


            Route::patch('/debt/{debt}', 'update')->name('debt.update')->can('update', 'debt');
            Route::get('/debt/{debt}/edit', 'edit')->name('debt.edit')->can('update', 'debt');

            Route::get('debt/search', 'search')->name('debt.search');
        });
    });
});
