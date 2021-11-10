<?php

use Illuminate\Routing\Router;
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

Route::prefix('/auth')->group(function(Router $router) {
    $router->get('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    $router->post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost']);
    $router->get('/registrar', [\App\Http\Controllers\AuthController::class, 'registrar']);
    $router->get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});


