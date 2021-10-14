@extends('layout.layout')

@section('title','Carrinho')

@section('content')

@php
    $total = 0;
@endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                @if (isset($cart) && count($cart) > 0)

                <h3>Itens do meu carrinho</h3>

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
                                @php
                                    $total +=$itensCarrinho->valor;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p><h4>Carrinho vazio</h4></p>
                @endif

                @if (isset($cart) && count($cart) > 0)
                <tfoot>
                    <tr>
                        <td colspan="5">
                            Valor total do pedidio R$ {{ $total }}
                        </td>
                    </tr>
                </tfoot>
                <form action="{{ route('finalizar_compra') }}" method="POST">
                    @csrf
                    <div class="pagamentos">
                        <p>Selecione a forma de pagamento</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Débito
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Crédito
                            </label>
                        </div>
                    </div>
                    <input type="submit" value="Finalizar compra" class="btn btn-success">
                </form>
                @endif
            </div>
        </div>
    </div>


@endsection
