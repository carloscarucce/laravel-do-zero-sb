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

    <hr/>

    <h3>Comentários: </h3>
    <form method="post" class="my-3">
        @csrf
        <input name="post_id" type="hidden" value="{{ $posts->id }}"/>

        <div class="row mb-3">
            <div class="col-12">
                <label class="control-label">Nome:</label>
                <input name="nome" type="text" placeholder="Digite seu nome..." maxlength="250" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <textarea name="nome" placeholder="Comentário..." maxlength="500" class="form-control"></textarea>
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100 h-100">
                    Enviar
                </button>
            </div>
        </div>
    </form>
    <hr/>
    <div id="comentarios"></div>

    <script>
        const carregarComentarios = function(url) {
            const listaComentarios = document.getElementById('comentarios');

            listaComentarios.innerHTML = 'Carregando comentários...';

            fetch(url)
                .then((response) => response.text())
                .then(function (html) {
                    listaComentarios.innerHTML = html;

                    const links = listaComentarios.querySelector('#paginas_comentarios')
                        .querySelectorAll('a.page-link');

                    for (let i in links) {
                        const link = links[i];
                        link.onclick = (function(){
                            carregarComentarios(this.href);
                            return false;
                        });
                    }
                });
        };

        carregarComentarios('{{ url("posts/{$posts->id}/comentarios") }}');
    </script>


@endsection