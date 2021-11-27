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
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

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
    {{-- Js da aplicação --}}
    <script src="/scripts/script.js"></script>
    {{-- Js da aplicação --}}

</head>
<body id="body">
    <header id="header">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('/imagem/LGpreta.png') }}" alt="logo da empresa">
            </a>
            <div id="search-container" class="col-md-4">
                <form action="/" method="GET">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscando por....">
                </form>
            </div>
            <ul class="navbar-nav">
                @auth
                <li>
                    <a href="/user/profiler" class="nav-link">@if(\Auth::user()){{ \Auth::user()->name }} @endif <i class="far fa-address-card fa-lg"></i></a>
                </li>
                @if (\Auth::user()->email == "amiltongomes2301@gmail.com")
                <li>
                    <a href="{{ route('admin') }}" class="nav-link">Admin <i class="fas fa-user-cog"></i></a></li>
                @endif
                <li>
                    <a href="{{ route('historico_compras') }}" class="nav-link">Compras <i class="fas fa-shopping-bag"></i></a>
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
                    {{--  --}}
                        @if (isset($tipoProdutos) || isset($marcaProdutos))
                        <div class="container filter-container">
                            <div class="row">
                                <div class="col-12 itens_select">
                                    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
                                    <ul class="navbar-nav">
                                        @foreach ($tiposProdutos as $produto )
                                            <form action="/" method="GET">
                                                @csrf
                                                <li class="nav-link">
                                                    <input class="nav-link nav-tipo" name="tipo" id="tipo"  onclick="this.form.submit()" type="submit" value="{{ $produto->tipo }}">
                                                </li>
                                            </form>
                                        @endforeach
                                        @foreach ($marcaProdutos as $produto )
                                            <form action="/" method="GET">
                                            @csrf
                                                <li class="nav-link">
                                                    <input class="nav-link nav-marca" name="marca" id="marca"  onclick="this.form.submit()" type="submit" value="{{ $produto->marca }}">
                                                </li>
                                                </form>
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                        @endif

                    @yield('content') {{-- Conteúdo do web site --}}
                </div>
            </div>
        </main>
        <footer>
        <p>
          <h5>Demadan Store &copy; 2021 Loja de roupas femeninas</h5>
        </p>
        <p>
            R. Joinville, 3001 - São Pedro, São José dos Pinhais - PR, 83307-070
        </p>
    </footer>

</body>
</html>
