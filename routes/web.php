<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category_form');
    Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('create_category');
    Route::get('/category/remove/{id}', [App\Http\Controllers\CategoryController::class, 'category_remove'])->name('category_remove');

    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product_form');
    Route::post('/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('create_product');
    Route::get('/product/remove/{id}', [App\Http\Controllers\ProductController::class, 'product_remove'])->name('product_remove');

    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
    Route::get('/order/{id}', [App\Http\Controllers\ProductController::class, 'order'])->name('order_form');
    Route::post('/order/confirm/', [App\Http\Controllers\ProductController::class, 'order_confirm'])->name('order_confirm');
    Route::get('/order/remove/{id}', [App\Http\Controllers\OrderController::class, 'order_remove'])->name('order_remove');

    Route::get('/employer', [App\Http\Controllers\EmployerController::class, 'index'])->name('employer');
    Route::get('/employer/create', [App\Http\Controllers\EmployerController::class, 'create'])->name('employer_form');
    Route::post('/employer/create', [App\Http\Controllers\EmployerController::class, 'store'])->name('create_employer');
    Route::get('/employer/remove/{id}', [App\Http\Controllers\EmployerController::class, 'employer_remove'])->name('employer_remove');

    Route::get('/stock', [App\Http\Controllers\StockController::class, 'index'])->name('stock');
    Route::get('/stock/create', [App\Http\Controllers\StockController::class, 'create'])->name('stock_form');
    Route::post('/stock/create', [App\Http\Controllers\StockController::class, 'store'])->name('create_stock');
    Route::get('/stock/remove/{id}', [App\Http\Controllers\StockController::class, 'stock_remove'])->name('stock_remove');

    Route::get('/cart/', [App\Http\Controllers\SaleController::class, 'index'])->name('cart');
    Route::get('/cart/{id}', [App\Http\Controllers\SaleController::class, 'cart'])->name('shop_cart');
    Route::get('/check', [App\Http\Controllers\SaleController::class, 'create'])->name('success_form');
    Route::get('/cart/remomve/{id}/{order_id}', [App\Http\Controllers\SaleController::class, 'remove_cart'])->name('remove_form');


});
Route::get('/category', [App\Http\Controllers\User_CategoryContoller::class, 'index'])->name('category_user');
