@extends('base')

@section('title', 'Categories')

@section('header')
    @parent

@endsection

@section('content')
        <ul class="categoryNews">
            @foreach($categories as $value)
                <li><a href="categories/category_{{$value['id']}}">{{$value['discription']}}</a></li>
            @endforeach
        </ul>
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
