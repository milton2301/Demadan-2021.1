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
                <th>Ver detalhes</th>
            </tr>
            @foreach($pedidos as $lista)
                <tr>
                    <td>{{ $lista->created_at->format('d/m/y H:i') }}</td>
                    <td>{{ $lista->statusDesc() }}</td>
                    <td>
                        <a href="" class="info btn btn-sm btn-info" data-value="{{ $lista->id }}" data-bs-toggle="modal" data-bs-target="#modalcompra">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="modalcompra">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalhes da compra</h5>
                </div>
                <div class="modal-body">
                    <div id="itenspedidos"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $(".info").on('click', function(){
                let id = $(this).attr("data-value")
                $.post('{{ route("detalhes_compras") }}', {id_pedido : id}, (resultado) => {
                    $("#itenspedidos").html(resultado)
                })
            })
        })
    </script>

@endsection
