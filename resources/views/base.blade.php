<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../../resources/css/style.css">

    </head>

    <body>
        @section('header')
            <div class="menu">
                <ul class="links">
                    <li class="menu-links"><a href="/public">Главная</a></li>
                    <li class="menu-links"><a href="/public/categories">Категории новостей</a></li>
                    <li class="menu-links"><a href="/public/signin">Авторизация</a></li>
                </ul>
                <ul class="links">
                    <li class="menu-links"><a href="/public/admin">Админка</a></li>
                </ul>
            </div>
        @show

        <div class="container">
            @yield('content')
        </div>

        <div class="footer">
            <p>News Agregator</p>
{{--            @yield('footer')--}}
        </div>

    </body>
</html>
