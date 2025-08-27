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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Route::get('/dashboard', function () {
//     return view('dashboardadmin');
// });

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::post('/', [HomeController::class, 'store'])->name('home.store');

Route::post('/products', [HomeController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [HomeController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [HomeController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [HomeController::class, 'destroy'])->name('products.destroy');