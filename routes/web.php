<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/pusher', [App\Http\Controllers\HomeController::class, 'pusher'])->name('pusher');
Route::get('/animation', [App\Http\Controllers\HomeController::class, 'animation'])->name('animation');
Route::get('/route', [App\Http\Controllers\HomeController::class, 'route'])->name('route');

Route::get('/chart', [App\Http\Controllers\HomeController::class, 'chart'])->name('chart.bind');
