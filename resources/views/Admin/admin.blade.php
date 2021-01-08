@extends('layouts.base')

@section('title', 'Админка')

@section('header')
    @parent

@endsection

@section('content')
    <p class="great" style="margin-top: 0px">{{$message}}</p>
@if(!$action ?? '')
    @foreach($categories as $category)
        <h5 class="admHeader">Категория: {{$category['description']}}</h5>
        @foreach($news as $item)
            @if($item['category_id'] == $category['id'])
                <div class="d-flex justify-content-between" style="border: #636b6f 1px solid; padding: 5px; margin-bottom: 5px">
                    <p style="width: 60%">Новость-{{$item['id']}}: {{$item['text']}}</p>
                    <div>
                        <a class="btn btn-primary" href="/public/admin/editnews?id={{$item['id']}}">Редактировать новость</a>
                        <a class="btn btn-primary" href="/public/admin/delnews?id={{$item['id']}}">Удалить новость</a>
                    </div>
                </div>
            @endif
        @endforeach
        <a class="btn btn-primary"  href="/public/admin/addnews">Добавить новость</a>
        <hr>
    @endforeach
    <a class="btn btn-primary" href="/public/admin/addcategory">Добавить категорию новостей</a>
@endif


    @if($action ?? '')
        <div class="container d-flex justify-content-center">
            <a class="btn btn-primary" href="/public/admin/admin">Перейти в админку</a>
        </div>
    @endif
@endsection
