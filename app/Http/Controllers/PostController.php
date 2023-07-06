<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with('autor')
            ->paginate(8);

        return view('post.index', compact('posts'));
    }

    public function show($slug)
    {
        $posts = Post::query()
            ->where('slug', $slug)
            ->first();
        
        return view("post.show", compact("posts"));
    }


    public function comentariolist($id)
    {
        $comentarios = Comentario::query()
            ->where('post_id', $id)
            ->paginate(8);
        
        return view("post.comments-list", compact("comentarios"));
    }


}