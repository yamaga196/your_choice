<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store', [StoreController::class, 'store_show'])->name('store_show');

Route::get('/product_list/{type}', [StoreController::class, 'product_list'])->name('product_list');

Route::get('/product_post', [StoreController::class, 'product_post'])->name('product_post');

Route::post('/product_post', [StoreController::class, 'product_create'])->name('product_create');

Route::get('/product_change/{id}', [StoreController::class, 'product_change'])->name('product_change');

Route::post('/product_change/{id}', [StoreController::class, 'product_update'])->name('product_update');

Route::post('/store/{id}', [StoreController::class, 'product_destroy'])->name('product_destroy');

Route::get('/product_popularity', [StoreController::class, 'product_popularity'])->name('product_popularity');

Route::get('/customer', [CustomerController::class, 'customer_show'])->name('customer_show');

Route::get('/customer-vote', [CustomerController::class, 'customer_vote'])->name('customer_vote');

Route::get('/customer_popularity', [CustomerController::class, 'customer_popularity'])->name('customer_popularity');
