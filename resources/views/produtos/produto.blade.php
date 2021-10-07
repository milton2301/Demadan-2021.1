@extends('layout.layout')

@section('title','Detalhes do ' .$produtos->nome)

@section('content')

<div id="prod-container" class="col-md-12">
    <h3>{{ $produtos->nome }}</h3>
    <div id="cards-container" class="row">
            <div id="cards" class="card col-md-3">
                <img src="/img/imagensRoupas/{{ $produtos->imagem }}" alt="{{$produtos->nome }}">
                <div id="card" class="card-body">
                    <p class="card-title">{{ $produtos->nome}}</p>
                    <p class="card-title">R$: {{ $produtos->valor}}</p>
                    <div class="container">
                    <div class="row">
                    <div class="col-md-4">
                        <a href="#"><i class="fas fa-cart-plus fa-lg"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="/"><i class="fas fa-reply-all fa-lg"></i></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#"><i class="fas fa-minus-square fa-lg"></i></a>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <h1>{{ $produtos->nome }}</h1>
                <p>Marca: {{ $produtos->marca}}</p>
                <p>Tamanho: {{ $produtos->tamanho }}</p>
                <p>Cor: {{ $produtos->cor}}</p>
                <p>Descrições: {{ $produtos->descricao }}</p>
                <p class="card-title"><i>Em até 5X de R$ {{ $parcelas = $produtos->valor / 5 }} s/juros no cartão da loja</i></p>
            </div>
            <div class="col-md-6">

        {{--  --}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="POST">
                        @csrf
                        <a href="#" class="btn btn-primary">Comprar <i class="fas fa-cart-plus fa-lg"></i></a>
                    </form>
                </div>
                <div class="col-md-4">
                @if ($admin == 'amiltongomes2301@gmail.com')
                    <a href="/admin/edit/{{ $produtos->id }}" class="btn btn-info edit-btn">Editar <i class="fas fa-edit"></i></a>
                </div>
                <div class="col-md-4">
                    <form action="/admin/{{ $produtos->id }}" method="POST">
                        @csrf
                        @method('DELETE') <br>
                        <button type="submit" class="btn btn-danger delete-btn">Excluir item <i class="fas fa-trash-alt fa-lg"></i></button>
                    </form>
                @endif
                </div>
            </div>
        </div>
        {{--  --}}

        </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection
