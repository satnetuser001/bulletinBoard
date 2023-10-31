@extends('layouts.base')

@section('title', 'Настройки сайта')

@section('main')
    <h2>Добро пожаловать, {{ Auth::user()->name }} !</h2>

    <nav>
        <p><h5><b>Главные настройки сайта:</b></h5></p>
        <p>Имя проэкта: {{ config('app.name') }}</p>
        <p>Режим работы сайта: {{ App::environment() }}</p>
        <p><h5><b>Настройки "Базы Данных" сайта:</b></h5></p>
        <p>Драйвер: {{ config('database.connections.mysql.driver') }}</p>
        <p>Хост: {{ config('database.connections.mysql.host') }}</p>
        <p>Порт: {{ config('database.connections.mysql.port') }}</p>
        <p>Имя БД: {{ config('database.connections.mysql.database') }}</p>
        <p>Пользователь БД: {{ config('database.connections.mysql.username') }}</p>
        <p>Пароль пользователя БД: {{ config('database.connections.mysql.password') }}</p>
        <p>Кодировка БД: {{ config('database.connections.mysql.charset') }}</p>
    </nav>
@endsection
