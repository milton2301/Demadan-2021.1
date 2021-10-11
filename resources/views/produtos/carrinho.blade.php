@extends('layout.layout')

@section('title','Carrinho')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <h3>Carrinho</h3>

                @if (isset($cart) && count($cart) > 0)

                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Imagem</th>
                                <th>Descrições</th>
                                <th>Cor</th>
                                <th>Marca</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $index => $itensCarrinho)
                                <tr>
                                    <td>{{ $itensCarrinho->nome }}</td>
                                    <td>{{ $itensCarrinho->valor }}</td>
                                    <td><img src="/img/imagensRoupas/{{ $itensCarrinho->imagem }}" height="50" alt="Foto"></td>
                                    <td>{{ $itensCarrinho->descricao }}</td>
                                    <td>{{ $itensCarrinho->cor }}</td>
                                    <td>{{ $itensCarrinho->marca }}</td>
                                    <td><a href="{{ route('remover', ['index' => $index]) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-lg"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum item no carrinho</p>
                @endif

            </div>
        </div>
    </div>


@endsection
