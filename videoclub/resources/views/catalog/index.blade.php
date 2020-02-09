@extends('layouts.master')

@section('content')
	@if(session()->has('notif'))
		<div class="row">
			<div class="alert alert-success">
				<button type="button" class="close pl-2" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>{{ __('Notification') }}: </strong> {{ __(session()->get('notif')) }}
			</div>
		</div>
	@endif

	<div class="row">
		@foreach( $arrayPeliculas as $pelicula )
		<div class="col-xs-5 col-sm-4 col-md-3 text-center">
			<a href="{{ url(app()->getLocale().'/catalog/show/'.$pelicula->id ) }}">
				<img src="{{ $pelicula->poster }}" style="height:280px"/>
				<h4 style="min-height: 45px; margin: 5px 0 10px 0">
					{{ $pelicula->title }}
				</h4>
			</a>
		</div>
		@endforeach
	</div>

@stop