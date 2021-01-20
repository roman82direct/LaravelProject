<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../../resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../resources/css/style.css">
    </head>

    <body>
    @include('blocks.header')

        <div class="container">
            @yield('content')
        </div>

    @include('blocks/footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../../../resources/js/bootstrap.min.js"></script>
    </body>
</html>
