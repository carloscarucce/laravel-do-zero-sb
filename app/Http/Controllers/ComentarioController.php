<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comentario\SaveRequest;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function save(SaveRequest $request)
    {
        $dados = $request->validated();

        $comentario = new Comentario();
        $comentario->fill($dados);

        $comentario->saveOrFail();

        //return redirect()->back();
    }
}
