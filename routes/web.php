<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $arquivo = public_path('uploads/post-1/capa.jpg');
    $pasta = dirname($arquivo);

    if (!is_dir($pasta)) {
        mkdir($pasta, recursive: true);
    }

    if (!is_writable($pasta)) {
        throw new Exception('A pasta não pode ser escrita');
    }

    //return redirect('posts');
});

Route::get('categorias', [Controllers\CategoriaController::class, 'index']);
Route::get('categorias/{categoriaId}', [Controllers\CategoriaController::class, 'posts']);

Route::get('posts', [Controllers\PostController::class, 'index']);
Route::get('posts/novo', [Controllers\PostController::class, 'create']);
Route::post('posts/salvar', [Controllers\PostController::class, 'save']);
Route::get('posts/{slug}', [Controllers\PostController::class, 'show']);
Route::get('posts/{id}/comentarios', [Controllers\PostController::class, 'commentsList']);

Route::post('comentarios/save', [Controllers\ComentarioController::class, 'save']);

