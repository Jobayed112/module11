<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/products','ProductController@index')->name('layouts.index');
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products/store', 'ProductController@store')->name('products.store');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/products/{id}/update', 'ProductController@update')->name('products.update');
Route::delete('/products/{id}/delete', 'ProductController@delete')->name('products.delete');


// Routes for products (CRUD operations)
Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/create', [ProductController::class, 'create']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::put('/products/{id}', [ProductController::class, 'update']);
// Route::delete('/products/{id}', [ProductController::class, 'delete']);

// Routes for sales (handling sales, updating product quantity)
Route::post('/sales', [SaleController::class, 'makeSale']);
Route::put('/sales/{id}', [SaleController::class, 'updateSale']);

// Routes for dashboard (displaying sales figures)
