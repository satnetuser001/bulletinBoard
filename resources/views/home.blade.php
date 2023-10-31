@extends('layouts.base')

@section('title', 'Мои объявления')

@section('main')
    <h2>Добро пожаловать, {{ Auth::user()->name }} !</h2>
    <p class="text-right"><a href="{{ route('addPage') }}">Добавить объявление</a></p>
    @if(count($bbs) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена, грн.</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bbs as $tuple)
                    <tr>
                        <td><h3>{{$tuple->title}}</h3></td>
                        <td>{{$tuple->price}}</td>
                        <td>
                            <a href="{{ route('detail', ['idItem'=>$tuple->id]) }}">Подробнее...</a>
                        </td>
                        <td>
                            <a href="{{ route('editPage', ['bbs'=>$tuple->id]) }}">Изменить</a>
                        </td>
                        <td>
                            <a href="{{ route('deletePage', ['bbs'=>$tuple->id]) }}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
