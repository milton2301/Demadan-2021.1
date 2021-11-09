@extends('layout.layout')

@section('title','Carrinho')

@section('content')

@php
    session_start();

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
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $index => $itensCarrinho)
                                <tr>
                                    <td>{{ $itensCarrinho->nome }}</td>
                                    <td>{{ $itensCarrinho->valor }}</td>
                                    @php
                                        echo number_format($itensCarrinho->valor, 2, ',','.');
                                    @endphp
                                    <td><img src="/img/imagensRoupas/{{ $itensCarrinho->imagem }}" height="50" alt="Foto"></td>
                                    <td>{{ $itensCarrinho->descricao }}</td>
                                    <td>{{ $itensCarrinho->cor }}</td>
                                    <td>{{ $itensCarrinho->marca }}</td>
                                    <td><a href="{{ route('remover', ['index' => $index]) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-lg"></a></td>
                                </tr>
                                @php
                                    $total +=$itensCarrinho->valor;
                                    $_SESSION['total'] = $total;
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
                            Valor total do pedidio R$ @php echo number_format($total, 2, ',','.'); @endphp</td>
                    </tr>
                </tfoot>
                <form action="{{ route('pagamento') }}" method="POST">
                    @csrf
                    <div class="pagamentos">
                    </div>
                    <input type="submit" value="Realizar pagamento" class="btn btn-success">
                </form>
                @endif
            </div>
        </div>
    </div>


@endsection
