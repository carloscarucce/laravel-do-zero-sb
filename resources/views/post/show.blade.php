@extends('site')

@section('title', 'Postagens')

@section('contents')
    <div class="row">
        {{ $posts->titulo }}
    </div>

    <div class="row">
        {!! nl2br(strip_tags($posts->conteudo)); !!}

        {{-- nl2br converte enter em <br>  --}}
    </div>

    <div class="row">
        <form method="post" action="" enctype="application/x-www-form-urlencoded">
            <input 'type="text"' 
        
            <div id="campos"></div>
        
            <br/>
            <button type="submit">
                Salvar
            </button>
        </form>
        
     </div>




@endsection