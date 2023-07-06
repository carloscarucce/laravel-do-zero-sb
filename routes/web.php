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
    $post = \App\Models\Post::find(1);
    $autor = $post->autor;
    $comentarios = $post->comentarios;

    return response()->json(compact('post', 'comentarios', 'autor'));
});

Route::get('categorias', [Controllers\CategoriaController::class, 'index']);
Route::get('posts', [Controllers\PostController::class, 'index']);

Route::get('posts/novo', [Controllers\PostController::class, 'create']);
Route::post('posts/salvar', [Controllers\PostController::class, 'save']);
Route::get('posts/{slug}', [Controllers\PostController::class, 'show']);

Route::get('posts/{id}/comentarios', [Controllers\PostController::class, 'comentariolist']);

Route::post('comentarios/save', [Controllers\PostController::class,'save']);
