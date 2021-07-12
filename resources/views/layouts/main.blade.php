<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <title>@yield("title")</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- mycss -->
        <link rel="stylesheet" href="/css/mainLayout.css">

        <!-- Css file -->
        @yield('css')
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 5px">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">Digital Wallet</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('dashboard')) ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('wallets')) ? 'active' : '' }}" aria-current="page" href="{{ route('wallets') }}">Wallets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('logout') }}">logout</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('login')) ? 'active' : '' }}" href="{{ route('login') }}">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link {{ (request()->routeIs('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row contentCss" >
                    <div class="col"></div>
                    <div class="col-6">
                        @yield('content')
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </body>
</html>
