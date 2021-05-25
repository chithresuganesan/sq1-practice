<?php

use Illuminate\Support\Facades\Route;
use App\Models\CustomRoute;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;


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


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/route', [HomeController::class, 'route'])->name('route');

$customroutes = CustomRoute::where('route_show', 'enable')->get();
foreach ($customroutes as $key => $routes) {
  Route::get('/'.$routes->group_url.'/'.$routes->url, [TestController::class, $routes->function_name])->name($routes->route_name);
  // $test =  'Route::'.$routes->request_type."('/".$routes->group_url.'/'.$routes->url."',[".$routes->controller_name."::class, '". $routes->function_name."'])->name('".$routes->route_name."');";
}

// Route::get('/basic/test',[TestController::class, 'test'])->name('test');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/pusher', [App\Http\Controllers\HomeController::class, 'pusher'])->name('pusher');
Route::get('/animation', [App\Http\Controllers\HomeController::class, 'animation'])->name('animation');
Route::get('/route', [App\Http\Controllers\HomeController::class, 'route'])->name('route');

Route::get('/chart', [App\Http\Controllers\HomeController::class, 'chart'])->name('chart.bind');

Route::get('/message/index', [App\Http\Controllers\MessageController::class, 'index']);
Route::get('/message/send', [App\Http\Controllers\MessageController::class, 'send']);


