@extends('layouts.master')

@section('content')
	<div class="row" style="margin-top:40px">
	   <div class="offset-md-3 col-md-6">
	      <div class="card">
	         <div class="card-header text-center">
	            {{ __('Add Film') }}
	         </div>
	         <div class="card-body" style="padding:30px">

	            {{-- TODO: Abrir el formulario e indicar el método POST --}}
				<form action="" method="POST">
	            	{{-- TODO: Protección contra CSRF --}}
	            	{{ csrf_field() }}

	            	<div class="form-group">
	            	   <label for="title">{{ __('Title') }}</label>
	            	   <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
						@error('title')
	            			<div class="text-danger">{{$message}}</div>
	            	   	@enderror
	            	</div>

	            	<div class="form-group">
	            	   {{-- TODO: Completa el input para el año --}}
	            	   <label for="year">{{ __('Year') }}</label>
	            	   <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror">
	            	   @error('year')
	            			<div class="text-danger">{{$message}}</div>
	            	   	@enderror
	            	</div>

	            	<div class="form-group">
	            	   {{-- TODO: Completa el input para el director --}}
	            	   <label for="director">{{ __('Director') }}</label>
	            	   <input type="text" name="director" id="director" class="form-control @error('director') is-invalid @enderror">
	            	   @error('director')
	            			<div class="text-danger">{{$message}}</div>
	            	   	@enderror
	            	</div>

	            	<div class="form-group">
	            	   {{-- TODO: Completa el input para el poster --}}
	            	   <label for="poster">{{ __('URL image') }}</label>
	            	   <input type="text" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror">
	            	   @error('poster')
	            			<div class="text-danger">{{$message}}</div>
	            	   	@enderror
	            	</div>

	            	<div class="form-group">
	            	   <label for="synopsis">{{ __('Spoiler') }}</label>
	            	   <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror" rows="3"></textarea>
	            	   @error('synopsis')
	            			<div class="text-danger">{{$message}}</div>
	            	   	@enderror
	            	</div>

	            	<div class="form-group text-center">
	            	   <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	            	       {{ __('Add Film') }}
	            	   </button>
	            	</div>
	            	
	            {{-- TODO: Cerrar formulario --}}
				</form>
	         </div>
	      </div>
	   </div>
	</div>
@stop