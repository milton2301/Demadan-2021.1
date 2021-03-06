<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title> {{-- Criar o titulo dinâmicamente --}}
    <link rel="shortcut icon" href="{{ asset('/imagem/dema.png') }}" type="image/x-icon">
    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    {{-- Bootstrap css --}}
    {{-- Bootstrap JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- Bootstrap JavaScript --}}
    {{-- Font de estilos do google --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- Font de estilos do google --}}
    {{-- Icons Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    {{-- Icons Awesome --}}
    {{-- Link css animate --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    {{-- Link css animate --}}
    {{-- css da aplicação --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- css da aplicação --}}

</head>
<body id="body">
    <header id="header">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
            <a href="{{ route('admin') }}" class="navbar-brand">
                <img src="{{ asset('/imagem/LGpreta.png') }}" alt="logo da empresa">
            </a>
            <div id="search-container" class="col-md-4">
                <form action="{{ route('admin') }}" method="GET">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscando por....">
                </form>
            </div>
            <ul class="navbar-nav">
                @auth
                <li>
                    <a href="/user/profiler" class="nav-link">@if(\Auth::user()){{ \Auth::user()->name }} @endif <i class="far fa-address-card fa-lg"></i></a>
                </li>
                <li>
                    <a href="{{ route('index') }}" class="nav-link">Visão do usuário <i class="far fa-eye"></i></a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair <i class="fas fa-sign-out-alt"></i></a>
                    </form>
                </li>
                @endauth
            </ul>
            </div>
        </nav>

        @if (isset($tipoProdutos) || isset($marcaProdutos))
        <div class="container hidden">
            <div class="row">
                <div class="col-4">
                    <ul class="nav nav-bar">
                        Tipo
                        <form action="/" method="GET">
                        @csrf
                        <select name="tipo" id="tipo">
                                @foreach ($tiposProdutos as $produto )
                                    <option value="{{ $produto->tipo }}">{{ $produto->tipo }}</option>
                                @endforeach
                        </select>
                        <input type="submit" value="Filtrar">
                    </form>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="nav nav-bar">
                        Marca
                        <form action="/" method="GET">
                        @csrf
                        <select name="marca" id="marca">
                                @foreach ($marcaProdutos as $produto )
                                    <option value="{{ $produto->marca }}">{{ $produto->marca }}</option>
                                @endforeach
                        </select>
                        <input type="submit" value="Filtrar">
                    </form>
                    </ul>
                </div>
            </div>
        </div>
        @endif


        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if($message = Session::get('err'))
                        <div class="col-12">
                            <div class="alert alert-danger">{{ $message }}</div>
                        </div>
                    @endif
                    @if($message = Session::get('ok'))
                        <div class="col-12">
                            <div class="alert alert-success">{{ $message }}</div>
                        </div>
                    @endif
                    @yield('content') {{-- Conteúdo do web site --}}
                </div>
            </div>
        </main>
        <footer>
        <p>
          <h5>Demadan Store &copy; 2021 Loja de roupas femeninas</h5>
        <p>
            Contato: <a href="mailto:newgenleaderspiiel@gmail.com">www.demadanstore.com.br</a>
        </p>
        </p>
    </footer>

</body>
</html>
