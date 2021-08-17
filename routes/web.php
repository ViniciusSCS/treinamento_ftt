<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('produto')->group(function () {
        Route::get('/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produto.cadastrar');
        Route::post('/cadastrar', [ProdutoController::class, 'salvar'])->name('produto.salvar');
        Route::get('/listar', [ProdutoController::class, 'listar'])->name('produto.listar');
    });

    Route::prefix('categoria')->group(function () {
        Route::get('/cadastrar', [CategoriaController::class, 'cadastrar'])->name('categoria.cadastrar');
        Route::post('/cadastrar', [CategoriaController::class, 'salvar'])->name('categoria.salvar');
        Route::get('/listar', [CategoriaController::class, 'listar'])->name('categoria.listar');
    });
});
