<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::resource('order', ServiceOrderController::class)->middleware('auth');
Route::post('/os/cliente/search', [ServiceOrderController::class, 'searchClient'])->name('search.client');
Route::post('delete/{id}', [ServiceOrderController::class, 'delete'])->name('delete');

Route::resource('client', ClientController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
Route::post('/product/search', [ServiceOrderController::class, 'searchProduct'])->name('search.product');

Route::resource('service', ServiceController::class)->middleware('auth');
Route::post('/service/search', [ServiceOrderController::class, 'searchService'])->name('search.service');

require __DIR__.'/auth.php';
