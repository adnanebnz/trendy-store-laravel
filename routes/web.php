<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*PRODUCT SECTION*/

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
/*PRODUCT SECTION END*/


/*AUTH SECTION*/
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
/*AUTH SECTION END*/


/*ORDER SECTION*/
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
/*ORDER SECTION END*/


/*ADMIN PRODUCT SECTION*/
Route::get('/admin/products', [AdminController::class, 'adminProductIndex'])->name('admin.products.index');
Route::get('/admin/products/create', [AdminController::class, 'adminProductCreate'])->name('admin.products.create');
Route::post('/admin/products', [AdminController::class, 'adminProductStore'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'adminProductEdit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminController::class, 'adminProductUpdate'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [AdminController::class, 'adminProductDestroy'])->name('admin.products.destroy');
/*ADMIN PRODUCT SECTION END*/


/*ADMIN ORDERS SECTION*/
Route::get("/admin/orders", [AdminController::class, "adminOrderIndex"])->name("admin.orders.index");
Route::get("/admin/orders/{order}", [AdminController::class, "adminOrderShow"])->name("admin.orders.show");
Route::put("/admin/orders/{order}", [AdminController::class, "adminOrderUpdate"])->name("admin.orders.update");
Route::delete("/admin/orders/{order}", [AdminController::class, "adminOrderDestroy"])->name("admin.orders.destroy");
/*ADMIN ORDERS SECTION END*/