<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelapsesController;
use App\Http\Controllers\VicesController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.landing.index')->name('landing');

Route::group(['middleware' => ['guest']], function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::group(['middleware' => ['auth']], function (): void {
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    })->name('dashboard.redirect');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function (): void {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::group(['middleware' => ['regular']], function (): void {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('/vice', VicesController::class);
        Route::resource('/relapse', RelapsesController::class);
    });
});
