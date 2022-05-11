<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dc.language" content="{{ app()->getLocale() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon"/>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
</head>
<body>
<div class="columns container-fluid">
    <div class="login-box">
        @yield('content')
    </div>
</div>
</body>
</html>
