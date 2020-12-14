@extends('base')

@section('title', 'Добавить новость')

@section('header')
    @parent

@endsection

@section('content')
    <form class="" role="form" action="" method="" name="">
        <div class="form-group">
            <label for="title">Название новости</label>
            <input type="text" class="" name="title" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="shortdiscr">Краткое описание</label>
            <input type="text" class="" name="shortdiscr" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="discription">Полный текст новости</label>
            <textarea name="discription" id="" cols="60" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Опубликовать</button>
    </form>
@endsection
