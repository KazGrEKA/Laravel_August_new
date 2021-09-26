<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ \Auth::user()->name }}</title>
</head>
<body>
    <h2>Добро пожаловать, {{ \Auth::user()->name }}!</h2>
    <br>
    @if (\Auth::user()->is_admin)
        <a href="{{ route('admin.index') }}">В админку</a>
    @endif
    <br>
    <a href="{{ route('logout') }}">Выход</a>
</body>
</html>