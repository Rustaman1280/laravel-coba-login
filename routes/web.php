<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DepartemenController;
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard')->middleware('iniLogin');

Route::resource('departemen', DepartemenController::class)->middleware('iniLogin');

Route::get('/login', [SessionController::class, 'index'])->middleware('iniTamu');
Route::get('sesi', [SessionController::class, 'index'])->middleware('iniTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('iniTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->middleware('iniLogin');
