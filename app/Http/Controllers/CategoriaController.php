<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::query()
            ->where('status', 'ativo')
            ->paginate(8);

        return view('categoria.index', compact('categorias'));
    }
}