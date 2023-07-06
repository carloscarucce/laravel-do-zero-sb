<div class="card">
    <x-img-capa :postId="$model->id"/>
    <div class="card-body">
        <h5 class="card-title">{{ $titulo }}</h5>
        <p class="card-text">{{ $conteudo }}</p>
        <p class="text-muted" style="font-size: 0.7em">
            Atualizado em {{ $model->updated_at->format('d/m/Y H:i:s') }}
        </p>

        <div class="text-end">
            <a href="{{ $href }}" class="btn btn-primary">Ver</a>
        </div>
    </div>
</div>
