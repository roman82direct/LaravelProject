@extends('layouts.base')

@section('title', 'Вход')

@section('header')
    @parent

@endsection

@section('content')

    <form class="logform" role="form" action="" method="" name="loginform">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="login" class="form-control" name="userlogin" id="login" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" name="userpassword" id="password" placeholder="Password">
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
