@extends('layouts.base')

@section('title', 'News/'.$news_Id)

@section('header')
    @section('link')
        <li class="menu-links"><a href="/public/addnews">Добавить новость</a></li>

@endsection

@section('content')
    <div class="title m-b-md">
        <p>{{$category}}/Новость {{$news_Id}}:</p>
        <p>{{$newsItem['text']}}</p>
    </div>
@endsection
