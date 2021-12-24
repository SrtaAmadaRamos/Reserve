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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth']);

Route::prefix('/auth')->group(function(Router $router) {
    $router->get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    $router->post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost']);
    $router->get('/registrar', [\App\Http\Controllers\AuthController::class, 'registrar']);
    $router->get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::prefix('/usuarios')->middleware(['auth', 'authorization'])->group(function(Router $router) {
    $router->get('/', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.listar');
    $router->get('/cadastrar', [\App\Http\Controllers\UsuarioController::class, 'cadastrarUsuario'])->name('usuarios.cadastrar');
    $router->post('/cadastrar', [\App\Http\Controllers\UsuarioController::class, 'cadastrarUsuarioPost']);
    $router->get('/editar/{id}', [\App\Http\Controllers\UsuarioController::class, 'editarUsuario'])->name('usuarios.editar');
    $router->post('/editar/{id}', [\App\Http\Controllers\UsuarioController::class, 'editarUsuarioPost']);
    $router->post('/excluir/{id}', [\App\Http\Controllers\UsuarioController::class, 'excluir'])->name('usuarios.excluir');
});

Route::prefix('/blocos')->middleware(['auth', 'authorization'])->group(function(Router $router) {
    $router->get('/', [\App\Http\Controllers\BlocoController::class, 'index'])->name('blocos.listar');
    $router->get('/cadastrar', [\App\Http\Controllers\BlocoController::class, 'cadastrarBloco'])->name('blocos.cadastrar');
    $router->post('/cadastrar', [\App\Http\Controllers\BlocoController::class, 'cadastrarBlocoPost']);
    $router->get('/editar/{id}', [\App\Http\Controllers\BlocoController::class, 'editarBloco'])->name('blocos.editar');
    $router->post('/editar/{id}', [\App\Http\Controllers\BlocoController::class, 'editarBlocoPost']);
    $router->post('/excluir/{id}', [\App\Http\Controllers\BlocoController::class, 'excluir'])->name('blocos.excluir');
});

Route::prefix('/salas')->middleware(['auth', 'authorization'])->group(function(Router $router) {
    $router->get('/', [\App\Http\Controllers\SalaController::class, 'index'])->name('salas.listar');
    $router->get('/cadastrar', [\App\Http\Controllers\SalaController::class, 'cadastrarSala'])->name('salas.cadastrar');
    $router->post('/cadastrar', [\App\Http\Controllers\SalaController::class, 'cadastrarSalaPost']);
    $router->get('/editar/{id}', [\App\Http\Controllers\SalaController::class, 'editarSala'])->name('salas.editar');
    $router->post('/editar/{id}', [\App\Http\Controllers\SalaController::class, 'editarSalaPost']);
    $router->post('/excluir/{id}', [\App\Http\Controllers\SalaController::class, 'excluir'])->name('salas.excluir');
});
