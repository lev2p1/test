<head>
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
</head>
<header id="header">
    <nav class="nsection">
        <div name="logo" href='/'>
        </div>
        <div class="nav-options" name="nav-options">
            <a tabindex="0" class="nav" href="/">Главная</a>
            <a tabindex="0" class="nav" href="/product/import">Импортировать</a>
        </div>
    </nav>
</header>


@yield('header')