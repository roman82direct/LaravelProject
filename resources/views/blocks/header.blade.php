@section('header')
    <div class="menu">
        <div class="upnav">
            <ul class="links mainnav">
                <li class="menu-links"><a href="/public">Главная</a></li>
                <li class="menu-links"><a href="/public/categories">Категории новостей</a></li>
                <li class="menu-links"><a href="/public/signin">Авторизация</a></li>
            </ul>

{{--            @if($admin ?? '')--}}
            <ul class="links">
                <li class="menu-links"><a href="/public/admin/admin">Админка</a></li>
            </ul>
{{--            @endif--}}
        </div>

        <div class="downnav">
            <ul class="links extnav">
                @yield('link')
            </ul>
        </div>
    </div>
@show
