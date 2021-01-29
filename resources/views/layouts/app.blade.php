<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cofetarie Vilceanu') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spatie.css') }}" rel="stylesheet">
    <livewire:styles />
</head>
<body>
    <div id="app">
    </div>
        @include('partials.header')

        @include('partials.nav')


        @yield('content')

        @include('partials.footer')


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>



</body>
</html>
