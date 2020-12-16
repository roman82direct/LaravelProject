@extends('layouts.base')

@section('title', 'News/'.$news_Id)

@section('header')
    @section('link')
        <li class="menu-links"><a href="/public/addnews">Добавить новость</a></li>

@endsection

@section('content')
    <div class="title m-b-md">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/public/categories">Все категории</a></li>
                <li class="breadcrumb-item"><a href="/public/categories/category_{{$categoryId}}">{{$category}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Новость {{$news_Id}}</li>
            </ol>
        </nav>
        <p>{{$newsItem['text']}}</p>
    </div>
@endsection
