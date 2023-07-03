<div class="card">
    <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=464&q=80" class="card-img-top" alt="..." style="max-width: 100%">
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
