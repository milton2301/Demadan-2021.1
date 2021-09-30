@extends('layout.layout') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}


@section('content') {{-- Corpo do site --}}
@auth
<div id="prod-container" class="col-md-12">
    <h3>Nossos produtos</h3>
    <div id="cards-container" class="row">
            @foreach ($produtos as $produto )
            <div id="card" class="card col-md-4">
                <img src="/img/imagensRoupas/{{ $produto->imagem }}" alt="{{$produto->nome }}">
                <div id="cards" class="card-body">
                    <p class="card-title">{{ $produto->nome}}</p>
                    <p class="card-title">Valor: {{ $produto->valor}}</p>
                    <a href="/produtos/produto/{{ $produto->id }}" class="btn btn-primary">Ver mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endauth
@endsection {{-- Fim do corpo deo site --}}
