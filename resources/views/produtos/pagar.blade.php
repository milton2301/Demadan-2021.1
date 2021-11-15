@extends('layout.layout')

@section('title','Pagamentos')

@section('content')

@php
    session_start();
    if(isset($_SESSION['total'])){
        $total = $_SESSION['total'];
    }
@endphp

<div class="container cont">
    <div class="col-md-4 offset-md-4">
        <h3>Informações para entrega</h3>
    </div>
    <div class="row">
        <div class="col-4">
            CEP: <input type="text" onkeydown="consultarCEP()" id="cep" name="cep" class="form-control" placeholder="Informe seu CEP">
        </div>
        <div class="col-4">
            Rua: <input type="text" id="rua" name="rua" class="form-control" placeholder="Nome da rua">
        </div>
        <div class="col-4">
            Número: <input type="text" id="numero" name="numero" class="form-control" placeholder="Número da casa/apartamento">
        </div>
        <div class="col-4">
            Bairro: <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro">
        </div>
        <div class="col-4">
            Cidade: <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade">
        </div>
        <div class="col-4">
            Estado: <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado">
        </div>
    </div>
</div>


<div class="container cont">
    <div class="col-md-4 offset-md-4">
        <h3>Formas de pagamento</h3>
    </div>
    <form action="{{route('finalizar_compra')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-4">
                Cartão de crédito: <i class="far fa-credit-card 7x"></i>
                <input type="text" name="ncredito" class="ncredito form-control" maxlength="19" required>
            </div>
            <div class="col-4">
                CVV:
                <input type="text" name="ncvv" class="ncvv form-control" required>
            </div>
            <div class="col-4">
                Validade:
                <input type="text" name="validade" class="validade form-control" required>
            </div>
            <div class="col-4">
                Nome do cartão:
                <input type="text" name="nomecartao" class="nomecartao form-control" required>
            </div>
            <div class="col-4">
                Selecione a forma de pagamento:
                <select name="" id="" class="nparcelas form-control">
                    <option value="1x" >Débito avista</option>
                    <option value="3x">3 x de R$ @php
                        $parcela = $total / 3;
                        echo number_format($parcela, 2, ',','.');
                    @endphp</option>
                    <option value="4x">4 x de R$ @php
                        $parcela = $total / 4;
                        echo number_format($parcela, 2, ',','.');
                    @endphp</option>
                    <option value="5x">5 x de R$ @php
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
</div>

@endsection
