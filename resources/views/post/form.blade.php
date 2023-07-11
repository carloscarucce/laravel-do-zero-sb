@php
$titulo = $post->id ? 'Editar postagem' : 'Criar postagem';
@endphp

@extends('site')

@section('title', $titulo)

@section('contents')
    <h1>{{ $titulo }}</h1>

    <form method="post" action="{{ url('posts/salvar') }}" enctype="multipart/form-data">
        @csrf
        <input name="id" type="hidden" value="{{ $post->id }}"/>
        <input name="user_id" type="hidden" value="{{ $post->user_id ?? 1 }}"/>

        <div class="row">
            <div class="col-12">
                <label>Título</label>
                <input name="titulo" type="text" value="{{ $post->titulo }}" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Conteúdo</label>
                <textarea name="conteudo" type="text" class="form-control">{{ $post->conteudo }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control">
                    <option value="">Selecione...</option>

                    @foreach($categorias as $categoria)
                        @php
                        $selecionado = $categoria->id == $post->categoria_id ? 'selected' : '';
                        @endphp
                        <option
                            {!! $selecionado !!}
                            value="{{ $categoria->id }}">
                            {{ $categoria->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Foto de capa</label>
                <input type="file" name="foto_capa" accept="image/jpeg" class="form-control"/>
            </div>
        </div>

        <div class="text-end mt-2">
            <button class="btn btn-lg btn-primary">
                Salvar
            </button>
        </div>
    </form>
@endsection
