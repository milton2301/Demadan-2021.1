@extends('layout.layout') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}

@section('content') {{-- Corpo do site --}}

    {{-- --------------------------------------- --}}
    @if($search || $filtroTipo || $filtroMarca) {{-- Se existir filtros some o carrosel --}}
        <div class="visually hidden"></div>
    @else {{-- Senão mostra o carrosel --}}
    <div class="container container-carrosel">
        <div class="row">
            <div class="col-md-8 offset-md-2 h-100 d-inline-block">

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active ">
                        <img class="img-itens" src="/img/imagensRoupas/3adce223ca01ff490a044702de51bdef" class="d-block w-100" alt="imagem da empresa">
                      </div>
                      @foreach ($produtos as $produto)
                      <div class="carousel-item">
                        <a href="{{ route('ver_produto',$produto->id) }}">
                        <img class="img-itens" src="/img/imagensRoupas/{{ $produto->imagem }}" class="d-block w-100" alt="
                        {{ $produto->nome }}">
                    </a>
                    </div>
                      @endforeach
                      </div>
                    </div>
        </div>
    </div>
    </div>
    @endif
    {{-- --------------------------------------- --}}


<div id="prod-container" class="col-md-12 animate__animated animate__fadeInRight">

    @if ($search)
        <h4> Todos os resultados da busca por <strong>{{ $search }}</strong></h4>
    @elseif($filtroTipo)
    <h4>Filtrando pelo Tipo <strong>{{ $filtroTipo }}</strong></h4>
    @elseif($filtroMarca)
    <h4>Filtrando pela Marca: <strong>{{ $filtroMarca }}</strong></h4>
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

<div class="box-cookies hide">
    <p class="msg-cookies">Este site usa cookies para garantir que você obtenha a melhor experiência. <a href="{{route('privacidade')}}">Política de Privacidade</a></p>
    <div class="btn-cookies">Entendi</div>
</div>

<script>
    if (!localStorage.Cookies) {
        document.querySelector(".box-cookies").classList.remove('hide');
    }

    const acceptCookies = () => {
        document.querySelector(".box-cookies").classList.add('hide');
        localStorage.setItem("Cookies", "accept");
    };

    const btnCookies = document.querySelector(".btn-cookies");

    btnCookies.addEventListener('click', acceptCookies);
</script>


@endsection {{-- Fim do corpo deo site --}}

