@extends('layout.layoutAdmin') {{-- Estendendo layout de --}}

@section('title','Estoque') {{-- Pegando titulo dinamicamente --}}

@section('content') {{-- Sessão de programação --}}
{{-- CORPO DO WEB SITE --}}
<div class="container-fluid">
    @foreach ($produtos as $prod )
        <input type="text" value="{{ $prod->nome}}">
        <br>
    @endforeach

    </div>

{{-- CORPO DO WEB SITE --}}
@endsection {{-- Fim da sessão de programação --}}
