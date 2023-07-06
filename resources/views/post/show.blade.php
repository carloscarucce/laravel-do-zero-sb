@extends('site')

@section('title', $post->titulo)

@section('contents')

    <h1>{{ $post->titulo }}</h1>

    <div class="mb-4">
        Categoria: <span class="badge bg-warning">{{ $post->categoria->descricao }}</span>
    </div>

    <div class="text-center my-2">
        <x-img-capa :postId="$post->id"/>
    </div>

    <div>
        {!! nl2br(strip_tags($post->conteudo, '<p><br><string>')) !!}
    </div>

    <div class="text-muted text-end mt-4">
        Criado por:
        {{ $post->autor?->name ?? 'Desconhecido' }} -
        Última atualização
        {{ $post->updated_at?->format('d/m/Y H:i:s') ?? $post->created_at?->format('d/m/Y H:i:s') }}
    </div>

    <hr/>

    <h3>Comentários: </h3>
    <form id="form_comentario" method="post" class="my-3" action="{{ url('comentarios/save') }}">
        @csrf
        <input name="post_id" type="hidden" value="{{ $post->id }}"/>

        <div class="row mb-3">
            <div class="col-12">
                <label class="control-label">Nome:</label>
                <input name="nome" type="text" placeholder="Digite seu nome..." maxlength="250" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <textarea name="conteudo" placeholder="Comentário..." maxlength="500" class="form-control"></textarea>
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

            //listaComentarios.innerHTML = 'Carregando comentários...';

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

        document.querySelector('#form_comentario').addEventListener('submit', function(e){
            e.preventDefault();
            const url = this.action;
            const options = {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-Csrf-Token": this.querySelector('input[name="_token"]').value,
                },
                mode: "cors", // no-cors, *cors, same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                credentials: "same-origin", // include, *same-origin, omit
                redirect: "follow",
                body: JSON.stringify({
                    "post_id": this.querySelector('input[name="post_id"]').value,
                    "nome": this.querySelector('input[name="nome"]').value,
                    "conteudo": this.querySelector('textarea[name="conteudo"]').value,
                })
            };

            const onSuccess = function () {
                carregarComentarios('{{ url("posts/{$post->id}/comentarios") }}');
            };
            const onError = function() {
                alert('Não foi possível enviar o comentário');
            };

            fetch(url, options).then(onSuccess, onError);
        });

        carregarComentarios('{{ url("posts/{$post->id}/comentarios") }}');
    </script>
@endsection
