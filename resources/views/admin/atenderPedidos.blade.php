@extends('layout.layoutAdmin')

@section('title','Atendendo Pedidos')

@section('content')

<div class="container-fluid">

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Atendendo Cliente <strong>{{ $usuario->name }}</strong></h1>


        <table class="table table-bordered">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>
            @foreach($listaItens as $itens )
            <tr>
                <td>{{ $itens->nome }}</td>
                <td>{{ $itens->quantidade }}</td>
                <td>{{number_format($itens->itemValor, 2, ',','.')}}</td>
            </tr>
            @endforeach
        </table>

        <form action="{{ route('pedidos_status',$pedido->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Status do Pedidos</label>
                <select name="status" id="status" class="form-control">
                    <option value="{{ $pedido->status }}">PENDENTE</option>
                    <option value="FIN">FINALIZAR</option>
                    <option value="CAN">CANCELAR</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Atualizar <i class="fas fa-sync fa-lg"></i></button>
        </form>
    </div>
</div>

@endsection
