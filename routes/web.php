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


Route::get('/admin/products', [ProductController::class, 'adminProductIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'adminProductCreate'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'adminProductStore'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'adminProductEdit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'adminProductUpdate'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'adminProductDestroy'])->name('admin.products.destroy');


Route::get("/admin/orders", [OrderController::class, "adminOrderIndex"])->name("admin.orders.index");
Route::get("/admin/orders/{order}", [OrderController::class, "adminOrderShow"])->name("admin.orders.show");
Route::put("/admin/orders/{order}", [OrderController::class, "adminOrderUpdate"])->name("admin.orders.update");
Route::delete("/admin/orders/{order}", [OrderController::class, "adminOrderDestroy"])->name("admin.orders.destroy");
