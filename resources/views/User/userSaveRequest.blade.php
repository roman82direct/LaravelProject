@extends('layouts.base')

@section('title', 'Скачать новость')

@section('header')
    @parent

@endsection

@section('content')
    <form class="logform" action="{{route('saveNewsToFile')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$news_Id}}" class="form-control" name="req['newsId']">
            <label for="name">Ваше имя</label>
            <input type="text" class="form-control" name="req['name']">
        </div>
        <div class="form-group">
            <label for="tel">Номер телефона</label>
            <input type="text" class="form-control" name="req['tel']">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" class="form-control" name="req['email']">
        </div>
        <div class="form-group">
            <label for="query">Комментарий</label>
            <input type="text" class="form-control" name="req['query']">
        </div>
        <button type="submit" class="btn btn-primary">Получить файл</button>
    </form>
@endsection
