<?php

use App\Http\Controllers\ApiMercadoPagoController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::get('success', [ApiMercadoPagoController::class, 'success'])->name('success');
Route::get('pending', [ApiMercadoPagoController::class, 'pending'])->name('pending');
Route::get('failure', [ApiMercadoPagoController::class, 'failure'])->name('failure');

Route::post('notifications', [ApiMercadoPagoController::class, 'notifications'])->name('notifications');


