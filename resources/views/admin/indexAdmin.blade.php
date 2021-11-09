@extends('layout.layoutAdmin') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}


@section('content') {{-- Corpo do site --}}

<div class="offset-md-9"><h5>Painel Administrativo</h5></div>

<div class="container">
    <div class="row">
        <div class="col-4">
            <a href="{{ route('cadastrar') }}" class="nav-link">Cadastrar Produto  <i class="far fa-plus-square fa-lg"></i></a>
        </div>
        <div class="col-4">
            <a href="{{ route('pedidos_pendentes') }}" class="nav-link">Pedidos não atendidos  <i class="fas fa-shopping-basket"></i></a>
        </div>
        <div class="col-4">
            <a href="{{ route('pedidos_finalizados') }}" class="nav-link">Pedidos atendidos  <i class="fas fa-cash-register"></i></a>
        </div>
    </div>
</div>

<div id="prod-container" class="col-md-12 animate__animated animate__fadeInRight">
    @if (isset($search))
        <h4> Todos os resultados da busca por <strong>{{ $search }}</strong></h4>
    @else
    <h3>Todos os produtos</h3>
    @endif
    <div id="cards-container" class="row">
        @foreach ($produtos as $produto )
            <div id="card" class="card col-md-4">
                <img src="/img/imagensRoupas/{{ $produto->imagem }}" alt="{{$produto->nome }}">
                <div id="cards" class="card-body">
                    <p class="card-title">{{ $produto->nome}}</p>
                    <p class="card-title">Marca: {{ $produto->marca}}</p>
                    <p class="card-title">Valor R$: {{ $produto->valor}}</p>
                    <a href="{{ route('ver_prod',$produto->id) }}" class="btn btn-primary">Ver detalhes do produto <i class="fas fa-info-circle fa-lg"></i></a>
                </div>
            </div>
        @endforeach
        @if(count($produtos) == 0 && $search)
            <p>Não foi possível encontrar nenhum resultado com {{ $search }}!</p>
            <p><a href="/" class="btn btn-primary">Voltar</a></p>
        @elseif(count($produtos)== 0)
            <p>Não há produto disponível</p>
        @endif

    </div>
</div>
</div>
@endsection {{-- Fim do corpo deo site --}}
