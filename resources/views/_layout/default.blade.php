<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reserve</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" type="text/css" rel="stylesheet">
    <!-- Styles -->

    <style>
        .validation-error ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
    </style>
</head>
<body class="">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('home')}}">Reserve</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav reserve-navbar-items">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Olá, {{request()->session()->get('nome', '')}}</a>
        </div>
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{route('logout')}}">Sair</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        @include('_layout.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @if (session('mensagem'))
                <div class="alert alert-success alert-dismissible fade show mt-3">
                    {{ session('mensagem') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
