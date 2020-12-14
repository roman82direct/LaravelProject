@section('header')
    <div class="menu">
        <ul class="links">
            <li class="menu-links"><a href="/public">Главная</a></li>
            <li class="menu-links"><a href="/public/categories">Категории новостей</a></li>
            <li class="menu-links"><a href="/public/signin">Авторизация</a></li>
        </ul>

        <ul class="links">
            @yield('link')
        </ul>

        <ul class="links">
            <li class="menu-links"><a href="/public/admin">Админка</a></li>
        </ul>
    </div>
@show
