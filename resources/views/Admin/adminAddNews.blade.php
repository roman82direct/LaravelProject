@extends('layouts.base')

@section('title', 'Добавить новость')

@section('header')
    @parent

@endsection


@section('title')
    Админка новости
@endsection

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-6">
            <h1>Новость</h1>

            <form class="" action="{{route('admin::news::saveNews')}}" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{$id ?? ''}}">
                <div class="form-group">
                    <label for="title">Название новости</label>
                    <input type="text" class="form-control" name="title" value="{{$model->value('title') ?? ''}}" placeholder="">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Выберите категорию новостей</label>
                    <select class="form-control" name="category" aria-label="category">
                        <option selected>{{$catTitle ?? 'Нажмите для выбора'}}</option>
                        @foreach($categories as $id=>$value)
                            <option> {{$value}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Полный текст новости</label>
                    <textarea class="form-control" name="text" id="" rows="10">{{$model->value('text') ?? ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Источник новости</label>
                    <input type="text" class="form-control" name="source" value="{{$model->value('source_id') ?? ''}}" placeholder="">
                </div>

                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </form>

        </div>
    </div>
@endsection

