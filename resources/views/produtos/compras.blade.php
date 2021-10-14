@extends('layout.layout')

@section('title','Histórico de compras')

@section('content')

    <div class="col-12">
        <h2>Minhas compras</h2>
    </div>

    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>Data e hora da compra</th>
                <th>Situação</th>
                <th></th>
            </tr>
            @foreach($pedidos as $lista)
                <tr>
                    <td>{{ $lista->created_at->format('d/m/y H:i') }}</td>
                    <td>{{ $lista->statusDesc() }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
