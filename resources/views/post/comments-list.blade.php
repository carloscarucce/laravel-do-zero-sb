@forelse($comentarios as $comentario)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">
                {{ $comentario->nome }} comentou em
                {{ $comentario->created_at->format('d/m/Y H:i:s') }}:
            </h5>
            <p class="card-text">
                {{ nl2br(strip_tags($comentario->conteudo)) }}
            </p>
        </div>
    </div>
@empty
    Nenhum comentário foi encontrado.
@endforelse

<div id="paginas_comentarios">
    {{ $comentarios->links() }}
</div>
