@extends('layout.layout') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}


@section('content') {{-- Corpo do site --}}
@auth
@if(\Auth::user()->email == "amiltongomes2301@gmail.com")
<div class="container">
    <div class="row">
        <div class="offset-md-9"><h5 class="msgAdmin">Visão do usuário</h5></div>
      </div>
</div>
@endif
@endauth
<div id="prod-container" class="col-md-12 animate__animated animate__fadeInRight">
    @if ($search)
        <h4> Todos os resultados da busca por <strong>{{ $search }}</strong></h4>
    @else
    <h3>Todos os nossos produtos</h3>
    @endif
    <div id="cards-container" class="row">
        @foreach ($produtos as $produto )
            <div id="card" class="card col-md-4">
                <img src="/img/imagensRoupas/{{ $produto->imagem }}" alt="{{$produto->nome }}">
                <div id="cards" class="card-body">
                    <p class="card-title">{{ $produto->nome}}</p>
                    <p class="card-title">Marca: {{ $produto->marca}}</p>
                    <p class="card-title">Valor: R$ {{number_format($produto->valor, 2, ',','.')}}</p>
                    <a href="{{ route('ver_produto',$produto->id) }}" class="btn btn-primary">Ver mais <i class="fas fa-info-circle fa-lg"></i></a>
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
