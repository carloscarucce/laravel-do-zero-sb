@extends('site')

@section('title', 'Categorias')

@section('contents')
    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-6 col-md-3 mb-2">
                <x-list-item
                    :titulo="$categoria->descricao"
                    conteudo="Categoria"
                    :href="url('categorias/'.$categoria->id)"
                    :model="$categoria"/>
            </div>
        @endforeach
    </div>

    {{ $categorias->withQueryString()->links() }}
@endsection
