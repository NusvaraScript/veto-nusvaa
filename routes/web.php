<?php

use App\Http\Controllers\VicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::resource('/vice', VicesController::class);