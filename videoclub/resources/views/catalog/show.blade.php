@extends('layouts.master')

@section('content')
	@if(session()->has('notif'))
		<div class="row">
			<div class="alert alert-success">
				<button type="button" class="close pl-2" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Notificación: </strong> {{ session()->get('notif')}}
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-sm-4">
			<img src="{{ $id->poster }}" style="height:280px"/>
		</div>

		<div class="col-sm-8">
			<span class="display-4 text-dark">{{ $id->title}}</span><br>
			<span><b>Año: </b>{{$id->year}}</span><br>
			<span><b>Director: </b>{{$id->director}}</span><br>
			<br>
			<p><b>Resumen: </b>{{$id->synopsis}}</p>
			<br>
			@if( $id->rented == false )
				<p><b>Estado: </b>Pelicula disponible</p>
				<br>
				<button class="btn btn-success">Alquilar película</button>
			@else
				<p><b>Estado: </b>Pelicula actualmente alquilada</p>
				<br>
				<button class="btn btn-danger">Devolver película</button>
			@endif
			<a href="/catalog/edit/{{ $id->id }}"><button class="btn btn-warning">Editar pelicula</button></a>
			<a href="/catalog/"><button class="btn btn-withe">Volver al listado</button></a>
		</div>
	</div>	
@stop