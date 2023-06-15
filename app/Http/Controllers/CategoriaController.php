<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Lista de categorias
     * @return mixed
     */
    public function index(): mixed
    {
        $categorias = Categoria::query()
            ->where('status', 'ativo')
            ->paginate(8);

        return view('categoria.index', compact('categorias'));
    }

    /**
     * Lista os posts de uma categoria
     * @return mixed
     */
    public function posts(int $categoriaId): mixed
    {
        $descricaoCategoria = Categoria::find($categoriaId)?->descricao ?? '-';
        $posts = Post::query()
            ->with('autor')
            ->where('categoria_id', $categoriaId)
            ->paginate(8);

        return view('categoria.posts', compact('descricaoCategoria', 'posts'));
    }
}
