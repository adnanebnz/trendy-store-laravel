<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
