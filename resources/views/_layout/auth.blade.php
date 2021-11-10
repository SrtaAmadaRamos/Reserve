<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reserve</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/signin.css') }}" type="text/css" rel="stylesheet">
        <!-- Styles -->

        <style>
            .error-login ul {
                list-style: none;
                padding-left: 0;
                margin: 0;
            }
        </style>
    </head>

    <body class="text-center">
        @yield('content')

        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    </body>
</html>
