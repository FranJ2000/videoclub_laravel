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
		<div class="col-sm-4">
			<img src="{{ $id->poster }}" style="height:280px"/>
		</div>

		<div class="col-sm-8">
			<span class="display-4 text-dark">{{ $id->title}}</span><br>
			<span><b>{{ __('Year') }}: </b>{{$id->year}}</span><br>
			<span><b>{{ __('Director') }}: </b>{{$id->director}}</span><br>
			<br>
			<p><b>{{ __('Spoiler') }}: </b>{{$id->synopsis}}</p>
			<br>
			@if( $id->rented == false )
				<p><b>{{ __('Status') }}: </b>{{ __('Movie available') }}</p>
				<br>
				<!--<button class="btn btn-success">Alquilar película</button>-->
				<form action="{{action('CatalogController@putRent', $id->id)}}" method="POST">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-success">{{ __('Rent movie') }}</button>
				</form>
			@else
				<p><b>{{ __('Status') }}: </b>{{ __('Movie currently rented') }}</p>
				<br>
				<!--<button class="btn btn-danger">Devolver película</button>-->
				<form action="{{action('CatalogController@putReturn', $id->id)}}" method="POST">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">{{ __('Return movie') }}</button>
				</form>
			@endif
			@if(Auth::user()->is_admin)
				<a href="{{ url(app()->getLocale().'/catalog/edit/'.$id->id) }}"><button class="btn btn-warning">{{ __('Edit movie') }}</button></a>
				<!--<a href="/catalog/edit/{{ $id->id }}"><button class="btn btn-warning">{{ __('Edit movie') }}</button></a>-->
				<form action="{{action('CatalogController@deleteMovie', $id->id)}}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">{{ __('Remove movie') }}</button>
				</form>
			@endif
			<a href=" {{url(app()->getLocale().'/catalog') }}"><button class="btn btn-withe">{{ __('Return to the catalog') }}</button></a>
		</div>
	</div>	
@stop