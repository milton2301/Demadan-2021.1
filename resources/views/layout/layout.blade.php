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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    {{-- Bootstrap JavaScript --}}
    {{-- Font de estilos do google --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- Font de estilos do google --}}
    {{-- Icons Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    {{-- Icons Awesome --}}
    {{-- css da aplicação --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- css da aplicação --}}

</head>
<body id="body">
    <header id="header">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('/imagem/LGpreta.png') }}" alt="logo da empresa">
            </a>
            <div id="search-container" class="col-md-5">
                <form action="/" method="GET">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscando por....">
                </form>
            </div>
            <ul class="navbar-nav">
                @auth
                <li>
                    <a href="/user/profiler" class="nav-link">@if(\Auth::user()){{ \Auth::user()->name }} @endif <i class="far fa-address-card fa-lg"></i></a>
                </li>
                <li>
                    <a href="{{ route('cadastrar') }}" class="nav-link">Cadastrar <i class="far fa-plus-square fa-lg"></i></a>
                </li>
                <li>
                    <a href="{{ route('ver_carrinho') }}" class="nav-link">Carrinho <i class="fab fa-shopify fa-lg"></i></a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair <i class="fas fa-sign-out-alt"></i></a>
                    </form>
                </li>
                @endauth
                @guest
                <li>
                    <a href="/register" class="nav-link">Cadastrar-se</a>
                </li>
                <li>
                    <a href="/login" class="nav-link">Logar-se</a>
                </li>
                @endguest
            </ul>
            </div>
        </nav>
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
          <h3>Demadan Store &copy; 2021</h3>
        </p>
    </footer>

    <script src="/js/script.js"></script>

</body>
</html>
