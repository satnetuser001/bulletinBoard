@extends('layouts.base')

@section('title', 'Главная')

@section('main')

	@if(count($Bbs) > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Товар</th>
					<th>Цена, грн.</th>
					<th>&nbsp</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Bbs as $tuple)
					<tr>
						<td><h3>{{$tuple->title}}</h3></td>
						<td>{{$tuple->price}}</td>
						<td>
							<a href="{{ route('detail', ['idItem'=>$tuple->id]) }}">Подробнее...</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif

@endsection('main')