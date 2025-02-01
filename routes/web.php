<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopPublicController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ShopController::class, 'createForm'])->name('dashboard');
    Route::post('/dashboard', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/shop/deployed/{shopName}', [ShopController::class, 'deployed'])->name('shop.deployed');
});



Route::group(['domain' => '{shopName}.domain.xxx'], function () {
    Route::get('/', [ShopPublicController::class, 'show']);
});
