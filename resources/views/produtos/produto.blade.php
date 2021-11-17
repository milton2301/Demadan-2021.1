@extends('layout.layout')

@section('title','Detalhes do ' .$produtos->nome)

@section('content')

<div id="container prod-container" class="col-md-10 offset-md-1 animate__animated animate__fadeInLeft">
    <p></p>
    <div id="cards-container" class="row-card">
            <div id="cards" class="card col-md-5">
                <img src="/img/imagensRoupas/{{ $produtos->imagem }}" alt="{{$produtos->nome }}">
            </div>
            <div class="col-md-7 desc">
                <h1>{{ $produtos->nome }}</h1>
                <p>Marca: {{ $produtos->marca}}</p>
                <p>Tamanho: {{ $produtos->tamanho }}</p>
                <p>Cor: {{ $produtos->cor}}</p>
                <p>Descrições: {{ $produtos->descricao }}</p>
                <p><strong><h5>R$ {{ number_format($produtos->valor, 2,',','.')}}</h5></strong></p>
                <p class="card-title"><i>Em até 5X de R$ {{ number_format($parcelas = $produtos->valor / 5, 2,',','.' )}}</i></p>
                {{--  --}}
                <div class="container">
                    <div>
                        <form action="" method="POST">
                            @csrf
                            <a href="{{ route('adicionar', ['id' => $produtos->id]) }}" class="btn btn-primary btn-prod">Adicionar <i class="fas fa-shopping-cart fa-lg"></i></a>
                        </form>
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
