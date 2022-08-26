<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// This is this route with same url... youre creating deadlock bro...ooh nimeona

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/', [\App\Http\Controllers\UserController::class, 'welcome']);

Route::post('/store', [\App\Http\Controllers\UserController::class, 'store']);

//Route::post('/users', [\App\Http\Controllers\UserController::class, 'user']);
Route::post('/update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::post('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');


Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('/uploadproduct', [App\Http\Controllers\ProductController::class, 'uploadproduct']);
Route::post('/update/', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::post('/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');


// Order controller
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index']);
