<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="<?php echo asset('css/font-awesome-4.7.0/css/font-awesome.min.css')?> ">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Alle Kruiden
                    </a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    Alle Kruiden
                </a>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Kruiden
                </a>
                <a class="navbar-brand" href="{{ url('/geneeskrachten') }}">
                    Geneeskrachten
                </a>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if(Route::current()->getName() == 'welcome'
                 || Route::current()->getName() == 'zoekOpNaam'
                 || Route::current()->getName() == 'zoekOpGeneeskracht'
                 )
                    <div class="col-sm-3 col-md-3">
                        <form method="post" action="zoekOpNaam" class="navbar-form" role="search">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Zoek op naam" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Werking <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($geneeskracht as $kracht)
                            <li><a href="{{route('zoekOpGeneeskracht',['q'=>$kracht->id])}}">{{$kracht->naam}}</a></li>
                                @endforeach

                        </ul>
                    </div>

                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
