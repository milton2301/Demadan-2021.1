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
    Total da geral: R$ {{number_format($total, 2, ',','.')}}

