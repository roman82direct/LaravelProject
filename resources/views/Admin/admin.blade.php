@extends('layouts.base')

@section('title', 'Админка')

@section('header')
    @parent

@endsection

@section('title')
    Новости
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Новости</h1>

                <a style="margin-bottom: 10px" class="btn btn-success" href="{{route('admin::news::createNews')}}">Создать</a>


            <div class="list-group">
                @forelse ($news as $item)

                    <div class="list-group-item">
                        <h2>{{$item->title}}</h2>
                        <p>Категория новостей: {{\App\Http\Models\NewsCategories::find($item->category_id)->title}}</p>
                            <a style="margin-bottom: 10px" class="btn btn-primary" href="{{route('admin::news::updateNews', ['id' => $item->id])}}">Изменить</a>
                            <a style="margin-bottom: 10px" class="btn btn-danger" href="{{route('admin::news::deleteNews', ['id' => $item->id])}}">Удалить</a>

                    </div>

                @empty
                    Новостей нет!
                @endforelse
            </div>
            <hr>
            <div class="row justify-content-center">
                {{$news->links()}}
            </div>
        </div>
    </div>
@endsection

{{--@section('content')--}}
{{--    <p class="great" style="margin-top: 0px">{{$message}}</p>--}}
{{--@if(!$action ?? '')--}}
{{--    @foreach($categories as $category)--}}
{{--        <h5 class="admHeader">Категория: {{$category['description']}}</h5>--}}
{{--        @foreach($news as $item)--}}
{{--            @if($item['category_id'] == $category['id'])--}}
{{--                <div class="d-flex justify-content-between" style="border: #636b6f 1px solid; border-radius: 4px; padding: 5px; margin-bottom: 5px">--}}
{{--                    <p style="width: 60%">Новость-{{$item['id']}}: {{$item['text']}}</p>--}}
{{--                    <div>--}}
{{--                        <a class="btn btn-primary" href="/public/admin/editnews?id={{$item['id']}}">Редактировать новость</a>--}}
{{--                        <a class="btn btn-primary" href="/public/admin/delnews?id={{$item['id']}}">Удалить новость</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        <a class="btn btn-primary"  href="/public/admin/addnews">Добавить новость</a>--}}
{{--        <hr>--}}
{{--    @endforeach--}}
{{--    <a class="btn btn-primary" href="/public/admin/addcategory">Добавить категорию новостей</a>--}}
{{--@endif--}}


{{--    @if($action ?? '')--}}
{{--        <div class="container d-flex justify-content-center">--}}
{{--            <a class="btn btn-primary" href="/public/admin/admin">Перейти в админку</a>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@endsection--}}
