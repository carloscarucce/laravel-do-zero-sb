@extends('site')

@section('title', 'Postagens')

@section('contents')
    <h1>Categoria: {{ $descricaoCategoria }}</h1>
    <hr class="mb-3"/>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-6 col-md-3 mb-2">
                <x-list-item
                    :titulo="$post->titulo"
                    :conteudo="'Por: ' . $post->autor->name"
                    :href=" url('posts/'.$post->slug) "
                    :model="$post"/>
            </div>
        @endforeach
    </div>

    {{ $posts->withQueryString()->links() }}
@endsection
