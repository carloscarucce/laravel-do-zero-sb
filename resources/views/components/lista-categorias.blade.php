<ul>
    @if(!empty($categorias))
        @foreach($categorias as $categoria)
            <li>
                <a href="{{ url("categorias/{$categoria->id}") }}">
                    {{ $categoria->descricao }} ({{ $categoria->posts_count }})
                </a>
            </li>
        @endforeach
    @endif
</ul>
