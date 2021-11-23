@extends('layout.layoutAdmin') {{-- Chama o layout para essa da nossa pagina --}}

@section('title','Pricipal') {{-- Pega o titulo dinâmicamente --}}


@section('content') {{-- Corpo do site --}}

<div class="col-12">
    <h2>Pedidos não atendidos</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data e hora da compra</th>
            <th>Situação</th>
            <th>Ver detalhes</th>
        </tr>
        @foreach($pedidos as $lista)
           @if($lista->statusDesc() == "PENDENTE")
                <tr>
                    <td>{{ $lista->created_at->format('d/m/y H:i') }}</td>
                    <td>{{ $lista->statusDesc() }}</td>
                    <td>
                        <a href="" class="info btn btn-sm btn-info" data-value="{{ $lista->id }}" data-bs-toggle="modal" data-bs-target="#modalcompra">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do pedido</h5>
            </div>
            <div class="modal-body">
                <div id="itenspedidos"></div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('atender_pedido', $lista->id) }}" class="btn btn-success">Atender pedido</a>
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
