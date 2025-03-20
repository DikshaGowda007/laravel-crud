<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});

// Route::redirect('/', 'home');


// Route::get('/', [PageController::class, 'showHome'])->name('home');

Route::get('/',[UserController::class, 'index'])->name('home');