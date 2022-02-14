<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Amazing E-Book</title>

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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   AMAZING E-BOOK
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link rounded-pill text-center" href="{{ route('login')}}"  style="width: 100px; {{ Request::is('login')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link rounded-pill text-center" href="{{ route('register') }}" style="width: 100px; {{ Request::is('register')? 'background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1)); color:white;':'color:black;'}}">{{ __('translate.register') }}</a>
                                </li>
                            @endif
                        @endguest
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
        {{-- style="height:20rem" --}}
        <main class="py-4">
            <div class="container" style="height: 80vh">
                <div class="row h-100">

                    <div class="col col-6" >
                        <div class="contrainer h-100 rounded-3 d-flex align-items-center p-5" style="background: linear-gradient(90deg, rgba(2,2,218,1), rgba(0,212,255,1));">
                            <p class=" h1 colo text-white text-center">{{ __('translate.welcome') }}</p>
                        </div>
                    </div>
                    <div class="col col-6 " style="">
                        <div class="contrainer h-100 rounded-3 p-5 justify-content-center">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
