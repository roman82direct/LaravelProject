@extends('layouts.base')

@section('title', 'Categories')

@section('header')
@section('link')
{{--    <li class="menu-links"><a href="/public/admin/addcategory">Добавить категорию новостей</a></li>--}}
    {{--        <li class="menu-links"><a href="/public/admin/delnews">Удалить новость</a></li>--}}

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Все категории</li>
        </ol>
    </nav>
        <ul class="categoryNews">
            @foreach($categories as $value)
                <li><a href="categories/category_{{$value['id']}}">{{$value['description']}}</a></li>
            @endforeach
        </ul>
    <a class="btn btn-primary" href="/public/admin/addcategory">Добавить категорию новостей</a>
@endsection

{{--    <body>--}}
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

{{--        </div>--}}
{{--    </body>--}}
