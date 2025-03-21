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
// Route::get('/edit',[UserController::class, 'edit'])->name('edit');
Route::put('/update/{id}',[UserController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
Route::post('/create', [UserController::class, 'store'])->name('create');