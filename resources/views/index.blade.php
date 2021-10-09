@extends('layout.layout') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}


@section('content') {{-- Corpo do site --}}

<div id="prod-container" class="col-md-12">
    @if ($search)
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
                    <p class="card-title">R$: {{ $produto->valor}}</p>
                    <a href="{{ route('produto',$produto->id) }}" class="btn btn-primary">Ver mais <i class="fas fa-info-circle fa-lg"></i></a>
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
