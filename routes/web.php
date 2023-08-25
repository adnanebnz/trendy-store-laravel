<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');


// Route::group(["prefix" => "admin", "middleware" => ["auth"]], function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//     Route::get('/products', [AdminController::class, 'adminProductIndex'])->name('admin.products.index');
//     Route::get('/products/create', [AdminController::class, 'adminProductCreate'])->name('admin.products.create');
//     Route::post('/products', [AdminController::class, 'adminProductStore'])->name('admin.products.store');
//     Route::get('/products/{product}/edit', [AdminController::class, 'adminProductEdit'])->name('admin.products.edit');
//     Route::put('/products/{product}', [AdminController::class, 'adminProductUpdate'])->name('admin.products.update');
//     Route::delete('/products/{product}', [AdminController::class, 'adminProductDestroy'])->name('admin.products.destroy');
//     Route::get("/orders", [AdminController::class, "adminOrderIndex"])->name("admin.orders.index");
//     Route::get("/orders/{order}", [AdminController::class, "adminOrderShow"])->name("admin.orders.show");
//     Route::put("/orders/{order}", [AdminController::class, "adminOrderUpdate"])->name("admin.orders.update");
//     Route::delete("/orders/{order}", [AdminController::class, "adminOrderDestroy"])->name("admin.orders.destroy");
// });


Route::get('/admin/products', [AdminController::class, 'adminProductIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [AdminController::class, 'adminProductCreate'])->name('admin.products.create');
Route::post('/admin/products', [AdminController::class, 'adminProductStore'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'adminProductEdit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminController::class, 'adminProductUpdate'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [AdminController::class, 'adminProductDestroy'])->name('admin.products.destroy');


Route::get("/admin/orders", [AdminController::class, "adminOrderIndex"])->name("admin.orders.index");
Route::get("/admin/orders/{order}", [AdminController::class, "adminOrderShow"])->name("admin.orders.show");
Route::put("/admin/orders/{order}", [AdminController::class, "adminOrderUpdate"])->name("admin.orders.update");
Route::delete("/admin/orders/{order}", [AdminController::class, "adminOrderDestroy"])->name("admin.orders.destroy");
