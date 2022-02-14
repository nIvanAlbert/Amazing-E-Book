<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                     AMAZING E-BOOK
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" style="padding-left: rem">
                        <li class="nav-link">
                            <a class="nav-link rounded-pill text-center" href="{{ route('home') }}" style="width: 100px; {{ Request::is('home')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.home') }}</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link rounded-pill text-center" href="{{ route('cart') }}" style="width: 100px; {{ Request::is('cart')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.cart') }}</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link rounded-pill text-center" href="{{ route('profile') }}" style="min-width: 100px; {{ Request::is('profile')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.profile') }}</a>
                        </li>
                        @if (Auth::user()->role_id ==2)    
                        <li class="nav-link">
                            <a class="nav-link rounded-pill text-center" href="{{ route('accMaintenance') }}" style=" {{ Request::is('accMaintenance')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.maintenance') }}</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link rounded-pill text-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('translate.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            @if (App::getLocale()=='id')
                                <img class="border border-1 border-primary p-1 rounded" src="{{ asset('/storage/lang-icon/id.png') }}" class="rounded img border-5 border-primary" alt="ID" style="width: 2.5rem">
                            @else
                            <img class="border border-1 border-primary p-1 rounded" src="{{ asset('/storage/lang-icon/en.png') }}" class="rounded img border-5 border-primary" alt="EN" style="width: 3rem">
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
