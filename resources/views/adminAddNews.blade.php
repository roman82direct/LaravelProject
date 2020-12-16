@extends('layouts.base')

@section('title', 'Добавить новость')

@section('header')
    @parent

@endsection

@section('content')
    <form class="" role="form" action="" method="" name="">

        <div class="form-group">
            <label for="title">Название новости</label>
            <input type="text" class="form-control" name="title" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="shortdiscr">Краткое описание</label>
            <input type="text" class="form-control" name="shortdiscr" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="discription">Полный текст новости</label>
            <textarea class="form-control" name="discription" id="" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>
@endsection
