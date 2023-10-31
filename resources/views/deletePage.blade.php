@extends('layouts.base')

@section('title', 'Удаление объявления :: Мои объявления')

@section('main')

	<h2>{{$bbs->title}}</h2>
	<p>Описание: {{$bbs->content}}</p>
	<p>Цена: {{$bbs->price}} грн.</p>
	<p>Автор объявления: {{$bbs->user->name}}</p>
	<p>Дата создания объявления: {{$bbs->created_at}}</p>
	<p>Дата изменения объявления: {{$bbs->updated_at}}</p>
	<a href="{{ route('index') }}">На перечень объявлений</a>

	<form action="{{ route('deleteTupleDB', ['bbs'=>$bbs->id]) }}" method="POST">
		@csrf
		@method('DELETE')
		<input type="submit" class="btn btn-danger" value="Удалить">
	</form>

@endsection('main')