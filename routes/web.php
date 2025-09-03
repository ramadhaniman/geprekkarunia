<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;



// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/login', function(){
//     return view ('login');
// });

// Route::get('/register', function(){
//     return view ('register');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


// Route::get('/dashboard', function () {
//     return view('dashboardadmin');
// });

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::post('/', [HomeController::class, 'store'])->name('home.store');

Route::post('/products', [HomeController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [HomeController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [HomeController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [HomeController::class, 'destroy'])->name('products.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout/{id}', [CartController::class, 'buy'])->name('checkout');
});

Route::get('/order', [CartController::class, 'order'])->name('cart.order');

Route::post('/order/store', [CartController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [CartController::class, 'info'])->name('order.info');


Route::get('/payment', [CartController::class, 'payment'])->name('payment.checkout');

Route::post('/orderinfo/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('orderinfo.store');

