@extends('layout.layout')

@section('title','Editando ' .$produto->nome)


@section('content')


<div class="container-fluid">

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $produto->nome }}</h1>

        <form action="/admin/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tipo</label>
                <input name="tipo" id="tipo"  class="form-control" value="{{ $produto->tipo }}">
            </div>
            <div class="form-group">
                <label for="title">Nome da peça</label>
                <input name="nome" id="nome"  class="form-control" value="{{ $produto->nome }}">
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea name="descricao" id="descricao"  class="form-control">{{ $produto->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Tamanho</label>
                <select name="tamanho" id="tamanho" class="form-control">
                    @if ($produto->tamanho == 'G')
                        <option value="{{ $produto->tamanho }}">Grande</option>
                    @elseif ($produto->tamanho == 'M')
                        <option value="{{ $produto->tamanho }}">Médio</option>
                    @elseif ($produto->tamanho == 'P')
                    <option value="{{ $produto->tamanho }}">Pequena</option>
                    @endif
                    @if ($produto->tamanho == 'G')
                        <option value="M">Médio</option>
                        <option value="P">Pequena</option>
                    @elseif($produto->tamanho == 'M')
                        <option value="G">Grande</option>
                        <option value="P">Pequena</option>
                    @elseif ($produto->tamanho == 'P')
                        <option value="G">Grande</option>
                        <option value="M">Médio</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="title">Cor</label>
                <input name="cor" id="cor"  class="form-control" value="{{ $produto->cor }}">
            </div>
            <div class="form-group">
                <label for="title">Marca</label>
                <input name="marca" id="marca" class="form-control" value="{{ $produto->marca }}">
            </div>
            <div class="form-group">
                <label for="title">Valor</label>
                <input type="text" name="valor" id="valor" class="form-control" value="{{ $produto->valor}}">
            </div>
            <div class="form-group">
                <label for="title">Trocar imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
                <img src="/img/imagensRoupas/{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-preview">
                <p>Imagem atual</p>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar <i class="fas fa-sync fa-lg"></i></button>
        </form>
    </div>

@endsection
