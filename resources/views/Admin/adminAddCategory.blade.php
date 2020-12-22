@extends('layouts.base')

@section('title', 'Добавить новость')

@section('header')
    @parent

@endsection

@section('content')
    <form class="" action="{{route('admin::news::createCategory')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название категории</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="discr">Описание категории</label>
            <input type="text" class="form-control" name="discr">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
