@extends('base')

@section('title', 'News')

@section('header')
    @parent
    <li class="menu-links"><a href="/public/addnews">Добавить новость</a></li>

@endsection

@section('content')
    <div class="title m-b-md">
        <p>{{$category}}/Новость {{$news_Id}}:</p><br>
        <p>{{$newsItem['text']}}</p>
    </div>
@endsection
