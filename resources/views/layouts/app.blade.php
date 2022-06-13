<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stylish&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://raw.githubusercontent.com/SoongCi/HoisuFront/main/src/assets/img/HoisuC%26R.png">

    @yield('styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hoisu') }}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--<script src="{{ asset('js/nav.js')}}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css' ) }}" rel="stylesheet">
</head>
<body>
    <div id="app">

       <!-- <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-s barra">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Hoisu') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>

                   
                    <ul class="navbar-nav ml-auto">
                       

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('perfiles.show', ['perfil' => Auth::user()->id ]) }}">
                                        {{ 'Ver mi perfil' }}
                                    </a>

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('recetas.index') }}">
                                        {{ 'Administrar mis restaurantes' }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->

        <nav class="navbar-hoisu">
            <ul id="header" style="background-color:transparent;">
                <a href="{{ url('/') }}" id="brand">
                <li>
                    {{ config('app.name', 'Hoisu') }}
                </li>
                </a>
                <label id="trigger2" for="x7"><img src="{{ asset('js/menu.png') }}" style="width:1.5rem; height:1.4rem;"></label>
            </ul>
            <input type="checkbox" id="x7" style="display:none" />
            <ul id="main">
                @guest
                    <a href="{{ route('login') }}">
                        <li class="x1">
                            {{ __('Login') }}
                        </li>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <li class="x1">
                                {{ __('Register') }}
                            </li>
                        </a>
                    @endif
                @else
                
                    <a href="#" id="trigger">
                        <li class="x1">
                            {{ Auth::user()->name }}&nbsp;
                            <span id="caret"></span>
                        </li>
                    </a>
                    <ul id="dropdown">
                    <!--<a href="{{ route('perfiles.show', ['perfil' => Auth::user()->id ]) }}">
                        <li>
                            {{ 'Ver mi perfil' }}
                        </li>
                    </a>-->
                    <a href="{{ route('recetas.index') }}">
                        <li>
                            {{ 'Mis restaurantes' }}
                        </li>
                    </a>
                    <a href="{{ route('reservas.index') }}">
                        <li>
                            {{ 'Mis reservaciones'}}
                        </li>
                    </a>
                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <li>{{ __('Logout') }}</li>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
                @endguest
            </ul>
        </nav>
        <!--<nav class="navbar navbar-expand-md navbar-light categorias-bg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categorias" aria-controls="categorias" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    Categorias
                </button>
                <div class="collapse navbar-collapse " id="categorias">
                    Left Side Of Navbar 
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        @foreach ($categorias as $categoria)
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('categorias.show', ['categoriaReceta' => $categoria->id ]) }}">
                               {{ $categoria->nombre }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>-->
        <ul class="nav justify-content-center mt-5">
            <!--<li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
            </li>-->
            @foreach ($categorias as $categoria)
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('categorias.show', ['categoriaReceta' => $categoria->id ]) }}" style="">
                        {{ $categoria->nombre }}
                    </a>
                </li>
            @endforeach           
        </ul>
        @yield('hero')
        <div class="" style="width:100vw; height:1rem; background:transparent; margin-top:4rem;"></div>
        <div class="container">
            <div class="row">
                <div class="py-6 mt-4 col-12">
                    @yield('botones')
                </div>

                <main class="py-3 col-12" style="text-align:center;">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
