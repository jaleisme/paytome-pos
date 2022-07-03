<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Logout;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/', Login::class);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/products', Product::class);
    Route::get('/cart', Cart::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/transactions', [App\Http\Controllers\HomeController::class, 'transaction']);
    Route::get('/transaction/{num}', [App\Http\Controllers\HomeController::class, 'transactionDetail']);
    Route::delete('/deleteProduct/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct']);
});

Route::get('/admintest', [App\Http\Controllers\HomeController::class, 'admintest']);

