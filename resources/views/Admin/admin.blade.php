@extends('layouts.base')

@section('title', 'Админка')

@section('header')
    @parent

@endsection

@section('content')
    <p class="great">{{$message}}</p>

    @if($action ?? '')
        <div class="container d-flex justify-content-center">
            <a class="btn btn-primary" href="/public/categories">Перейти к новостям</a>
        </div>
    @endif
@endsection
