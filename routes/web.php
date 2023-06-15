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

    return response()->json($dados);

    //return redirect('posts');
});

Route::get('categorias', [Controllers\CategoriaController::class, 'index']);
Route::get('categorias/{categoriaId}', [Controllers\CategoriaController::class, 'posts']);

Route::get('posts', [Controllers\PostController::class, 'index']);
