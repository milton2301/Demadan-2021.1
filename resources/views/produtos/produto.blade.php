@extends('layout.layout')

@section('title','Detalhes do ' .$produtos->nome)

@section('content')

<div id="prod-container" class="col-md-12">
    <h3>{{ $produtos->nome }}</h3>
    <div id="cards-container" class="row">
            <div id="cards" class="card col-md-4">
                <img src="/img/imagensRoupas/{{ $produtos->imagem }}" alt="{{$produtos->nome }}">
                <div id="card" class="card-body">
                    <p class="card-title">{{ $produtos->nome}}</p>
                    <p class="card-title">Valor: {{ $produtos->valor}}</p>
                    <a href="/" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            <div class="col-md-4">
                <h1>{{ $produtos->nome }}</h1>
                <p>Marca: {{ $produtos->marca}}</p>
                <p>Tamanho: {{ $produtos->tamanho }}</p>
                <p>Cor: {{ $produtos->cor}}</p>
                <p>Descrições: {{ $produtos->descricao }}</p>
                <p class="card-title"><i>Em até 5X de R$ {{ $parcelas = $produtos->valor / 5 }} s/juros no cartão da loja</i></p>
            </div>
            <div class="col-md-4">
                <form action="" method="POST">
                    @csrf
                    <button>Comprar</button>
                </form>

                {{--  --}}
                <a href="/" class="btn btn-primary">Voltar</a>
                <a href="/admin/edit/{{ $produtos->id }}" class="btn btn-info edit-btn">Editar</a>
                <form action="/admin/{{ $produtos->id }}" method="POST">
                    @csrf
                    @method('DELETE') <br>
                    <button type="submit" class="btn btn-danger delete-btn">Excluir item</button>
                </form>

                {{--  --}}

            </div>
    </div>
</div>
<script>

</script>

@endsection
