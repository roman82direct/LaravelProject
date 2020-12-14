@extends('base')

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

        <input type="checkbox" id="remember" name="subscribe" value="Запомнить меня">
        <label for="remember">Remember Me</label>

        <button type="submit" class="btn btn-default">Отправить</button>
    </form>
@endsection
