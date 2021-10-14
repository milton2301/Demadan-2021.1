@extends('layout.layout')

@section('title','Detalhes do ' .$produtos->nome)

@section('content')

<div id="container prod-container" class="col-md-10 offset-md-1 animate__animated animate__fadeInLeft">
    <p></p>
    <div id="cards-container" class="row-card">
            <div id="cards" class="card col-md-5">
                <img src="/img/imagensRoupas/{{ $produtos->imagem }}" alt="{{$produtos->nome }}">
            </div>
            <div class="col-md-5 desc">
                <h1>{{ $produtos->nome }}</h1>
                <p>R$: {{ $produtos->valor}}</p>
                <p>Marca: {{ $produtos->marca}}</p>
                <p>Tamanho: {{ $produtos->tamanho }}</p>
                <p>Cor: {{ $produtos->cor}}</p>
                <p>Descrições: {{ $produtos->descricao }}</p>
                <p class="card-title"><i>Em até 5X de R$ {{ $parcelas = $produtos->valor / 5 }} s/juros no cartão da loja</i></p>
                {{--  --}}
                <div class="container">
                        <div class="col-4">
                            <form action="" method="POST">
                                @csrf
                                <a href="{{ route('adicionar', ['id' => $produtos->id]) }}" class="btn btn-primary btn-prod">Adicionar <i class="fas fa-shopping-cart fa-lg"></i></a>
                            </form>
                        </div>
                        <div class="col-4">
                        @if ($admin == 'amiltongomes2301@gmail.com')
                            <a href="{{ route('editar',$produtos->id)}}" class="btn btn-info edit-btn btn-prod">Editar <i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-4">
                            <form action="/admin/{{ $produtos->id }}" method="POST">
                                @csrf
                                @method('DELETE') <br>
                                <button type="submit" class="btn btn-danger delete-btn btn-prod">Excluir item <i class="fas fa-trash-alt fa-lg"></i></button>
                            </form>
                        @endif
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
