@extends('layout.layoutAdmin')

@section('title','Atendendo Pedidos')

@section('content')

<div class="container-fluid">

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Atendendo: {{ $pedido->id }}</h1>

        <div class="form-group">
            <label for="title">Cliente</label>
            <label for="" class="form-control">{{ $user->name }}</label>
            {{-- <input type="text" name="valor" id="valor" class="form-control" value="{{ $user->name}}">
 --}}        </div>

        <form action="{{ route('pedidos_status',$pedido->id) }}{{-- /admin/update/$pedido->id --}} }}" method="POST">
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
