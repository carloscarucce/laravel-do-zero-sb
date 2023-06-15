@extends('site')

@section('title', 'Postagens')

@section('contents')
    <div class="row">
        @foreach($posts as $post)
            <div class="col-6 col-md-3 mb-2">
                {{ $post->titulo }}
                {{-- <x-list-item
                    :titulo="$post->titulo"
                    :conteudo="'Por: ' . $post->autor->name"
                    href="#"
                    :model="$post"/>
                --}}
            </div>
        @endforeach
    </div>

    {{ $posts->withQueryString()->links() }}
@endsection