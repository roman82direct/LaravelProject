@extends('layouts.base')

@section('title', 'Добавить новость')

@section('header')
    @parent

@endsection

@section('content')
    <p>{{$message}}</p>
    <form class="" action="{{route('admin::news::createNews')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название новости</label>
            <input type="text" class="form-control" name="news[title]" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="category">Выберите категорию новостей</label>
            <select class="form-control" name="news[category]" aria-label="category">
                <option selected>Нажмите для выбора</option>
                @foreach($categories as $value)
                    <option value="{{$value['id']}}">{{$value['title']}}</option>
                @endforeach
            </select>

{{--            <input type="text" class="form-control" name="news[shortdiscr]" id="" placeholder="">--}}
        </div>
        <div class="form-group">
            <label for="description">Полный текст новости</label>
            <textarea class="form-control" name="news[description]" id="" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Источник новости</label>
            <input type="text" class="form-control" name="news[source]" id="" placeholder="">
        </div>

        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>
@endsection
