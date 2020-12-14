@extends('base')

@section('title', 'Админка')

@section('header')
    @parent

@endsection

@section('content')
    <p class="great">{{$message}}</p>
@endsection
