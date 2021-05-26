<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Studentski zbor sveučilišta u Mostaru">
    <meta property="og:description" content="Studentski zbor sveučilišta u Mostaru">
    <meta property="og:image" content="/images/sz-logo-crop.png">
    <meta property="og:url" content="https://studentskizbor.sum.ba">

    <meta name="twitter:title" content="Studentski zbor sveučilišta u Mostaru">
    <meta name="twitter:description" content="Studentski zbor sveučilišta u Mostaru">
    <meta name="twitter:image" content="/images/sz-logo-crop.png">
    <meta name="twitter:image:alt" content="Studentski zbor sveučilišta u Mostaru logo">
    <meta name="twitter:card" content="summary">

    <meta name="keywords" content="Studentski zbor Mostar">
    <meta name="description" content="Studentski zbor sveučilišta u Mostaru">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/sz-logo-crop.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/sz-logo-crop.png">
    
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">    <!--Naknadno-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studentski zbor - Sveučilište u Mostaru</title>

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
    <main>
    @yield('content')
    </main>
    </div>
</body>
</html>
