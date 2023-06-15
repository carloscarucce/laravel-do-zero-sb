@extends('site')

@section('title', 'Postagens')

@section('contents')
    <div class="row">
        <div class="col-8 col-md-10">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-3 mb-2">
                        <x-list-item
                            :titulo="$post->titulo"
                            :conteudo="'Por: ' . $post->autor->name"
                            href="#"
                            :model="$post"/>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-4 col-md-2">
            <x-lista-categorias/>
        </div>
    </div>

    {{ $posts->withQueryString()->links() }}
@endsection
