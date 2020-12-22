@extends('layouts.base')

@section('title', 'News/'.$news_Id)

@section('header')
    @section('link')
        <li class="menu-links"><a href="/public/admin/addnews">Добавить новость</a></li>
{{--        <li class="menu-links"><a href="/public/admin/delnews">Удалить новость</a></li>--}}
        <form class="" action="{{route('admin::news::deleteNews')}}" method="POST">
            @csrf
            <input type="hidden" name="news[id]" value="{{$news_Id}}">
            <button type="submit" class="btn">Удалить новость</button>
        </form>

@endsection

@section('content')
{{--    @php--}}
{{--    dd($newsItem);--}}
{{--    @endphp--}}

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
