<?php

use App\Http\Controllers\VicesController;
use App\Http\Controllers\RelapsesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::resource('/vice', VicesController::class);
Route::resource('/relapse', RelapsesController::class);