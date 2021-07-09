<?php

use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceOrderController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('os', ServiceOrderController::class)->middleware('auth');
Route::post('/os/cliente/search', [ServiceOrderController::class, 'searchClient'])->name('search.client');
Route::post('delete/{id}', [ServiceOrderController::class, 'delete'])->name('delete');

Route::resource('cliente', ClientController::class)->middleware('auth');


Route::resource('services', ServiceController::class)->middleware('auth');

require __DIR__.'/auth.php';
