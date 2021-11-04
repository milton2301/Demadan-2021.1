@extends('layout.layout')

@section('title','Pagamentos')

@section('content')

@php
    session_start();
    if(isset($_SESSION['total'])){
        $total = $_SESSION['total'];
    }
@endphp

    <form action="{{route('finalizar_compra')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-4">
                Cartão de crédito: <i class="far fa-credit-card 7x"></i>
                <input type="text" name="ncredito" class="ncredito form-control" maxlength="19" required>
            </div>
            <div class="col-4">
                CVV:
                <input type="text" name="ncvv" class="ncvv form-control">
            </div>
            <div class="col-4">
                Validade:
                <input type="text" name="validade" class="validade form-control">
            </div>
            <div class="col-4">
                Nome do cartão:
                <input type="text" name="nomecartao" class="nomecartao form-control">
            </div>
            <div class="col-4">
                Parcelas:
                <select name="" id="" class="nparcelas form-control">
                    <option value="0" >Número de parcelas</option>
                    <option value="">3 x de R$ @php
                        $parcela = $total / 3;
                        echo number_format($parcela, 2, ',','.');
                    @endphp</option>
                    <option value="">4 x de R$ @php
                        $parcela = $total / 4;
                        echo number_format($parcela, 2, ',','.');
                    @endphp</option>
                    <option value="">5 x de R$ @php
                        $parcela = $total / 5;
                        echo number_format($parcela, 2, ',','.');
                    @endphp</option>
                </select>
            </div>
            <div class="col-4">
                Total da compra:
                <input type="text" name="totalfinal" class="totalfinal form-control" value="R$ @php echo number_format($total, 2, ',','.'); @endphp">
            </div>
            <div class="col-4">
                @csrf
                <input type="submit" value="Pagar" class="btn btn-lg btn-success pagar">
            </div>
        </div>
    </form>

@endsection
