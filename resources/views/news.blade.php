@extends('layouts.base')

@section('title', 'News')

@section('header')
@section('link')
    <li class="menu-links"><a href="/public/addnews">Добавить новость</a></li>
{{--    @parent--}}
{{--    <li class="menu-links"><a href="/public/addnews">Добавить новость</a></li>--}}
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/public/categories">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$catDiscr}}</li>
        </ol>
    </nav>
    <ul class="categoryNews">
            @foreach($sortNews as $value)
                <li><a href="category_{{$category_Id}}/item_{{$value['id']}}">{{$value['text']}}</a></li>
            @endforeach
    </ul>
@endsection
