@extends('layouts.base')

@section('title', 'Welcome')

@section('header')
    @parent

@endsection

@section('content')
    <p class="great">{{$message}}</p>
@endsection
