<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with('autor')
            ->paginate(8);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $categorias = Categoria::query()->orderBy('descricao')->get();

        return view('post.form', compact('post', 'categorias'));
    }

    public function save(Request $request)
    {
        try {

            DB::beginTransaction();

            $post = Post::findOrNew($request->get('id'));
            $post->fill($request->all());
            $post->slug = Str::slug($post->titulo);
            $post->save();

            if ($request->hasFile('foto_capa')) {
                /* @var $capa UploadedFile */
                $capa = $request->files->get('foto_capa');

                $arquivo = public_path('uploads/post-'.$post->id.'/capa.jpg');
                $pasta = dirname($arquivo);

                if (!is_dir($pasta)) {
                    mkdir($pasta, recursive: true);
                }

                if (!is_writable($pasta)) {
                    throw new Exception('A pasta não pode ser escrita');
                }

                $capa->move($pasta, 'capa.jpg');
            }

            DB::commit();
            return redirect('posts/'.$post->slug);

        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function show($slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->first();

        return view('post.show', compact('post'));
    }

    public function commentsList($id)
    {
        $comentarios = Comentario::query()
            ->where('post_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('post.comments-list', compact('comentarios'));
    }
}
