<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/products', [WebController::class, 'products'])->name('products');
Route::get('/product/{id}', [WebController::class, 'product'])->name('product');
Route::get('/admin', [WebController::class, 'admin'])->name('admin');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/category', [WebController::class, 'addCategory'])->name('addCategory');
Route::delete('/category', [WebController::class, 'delCategory'])->name('delCategory');
Route::post('/product', [WebController::class, 'addProduct'])->name('addProduct');
