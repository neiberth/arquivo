<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">
<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Neiberth Lucena">
    <meta name="generator" content="Neiberth 0.1.1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css')}}">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="{{ asset('css/styleDashboard.css')}}" rel="stylesheet">
      <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    @include('app.layouts._partial.svg')

    <header class="navbar navbar-expand-md navbar bg-primary shadow-sm p-0" data-bs-theme="dark">
        @include('app.layouts._partial.header')
    </header>

    <div class="container-fluid">
        @include('app.layouts._partial.dashboard')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer mt-3 py-2  bg-primary " data-bs-theme="dark">
        @include('app.layouts._partial.footer')
    </footer>
    
</body>
</html>
