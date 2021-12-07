<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/import', [App\Http\Controllers\HomeController::class, 'importFile'])->name('import');
Route::get('/start', [\App\Http\Controllers\HomeController::class, 'start'])->name('start');
Route::post('/start/charts', [\App\Http\Controllers\HomeController::class, 'chartData'])->name('charts');
Route::get('/start/table/{id}', [\App\Http\Controllers\HomeController::class, 'chartTable'])->name('table');
