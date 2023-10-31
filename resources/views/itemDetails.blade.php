@extends('layouts.base')

@section('title', $Bbs->title)

@section('main')

	<h2>{{$Bbs->title}}</h2>
	<p>Описание: {{$Bbs->content}}</p>
	<p>Цена: {{$Bbs->price}} грн.</p>
	<p>Автор объявления: {{$Bbs->user->name}}</p>
	<p>Дата создания объявления: {{$Bbs->created_at}}</p>
	<p>Дата изменения объявления: {{$Bbs->updated_at}}</p>
	<a href="{{ route('index') }}">На перечень объявлений</a>

@endsection('main')