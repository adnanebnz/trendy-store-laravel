<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'adminCreate'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'adminStore'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'adminEdit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'adminUpdate'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'adminDestroy'])->name('admin.products.destroy');


Route::get("/admin/orders", [OrderController::class, "adminIndex"])->name("admin.orders.index");
Route::get("/admin/orders/{order}", [OrderController::class, "adminShow"])->name("admin.orders.show");
Route::put("/admin/orders/{order}", [OrderController::class, "adminUpdate"])->name("admin.orders.update");
Route::delete("/admin/orders/{order}", [OrderController::class, "adminDestroy"])->name("admin.orders.destroy");
