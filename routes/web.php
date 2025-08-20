<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view ('login');
});

Route::get('/register', function(){
    return view ('register');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
