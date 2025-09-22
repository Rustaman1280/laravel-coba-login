<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DepartemenController;
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('departemen', DepartemenController::class);

Route::get('/login', [SessionController::class, 'index']);
Route::get('sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
