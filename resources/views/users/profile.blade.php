@extends('users.base')

@section('section_name')
	Mi perfil!
@endsection

@section('user_content')
	<form action="#" method="POST" onSubmit="return false">
		{{ csrf_field() }}
	    {{-- Email del usuario --}}
	    <div class="form-group">
	      <label for="email">Email</label>
	      <input type="email" name="email" class="form-control" value="{{$profile->email}}" >
	    </div>

	    {{-- Nombre del usuario --}}    
	    <div class="form-group">
	      <label for="name">Nombre</label>
	      <input type="text" name="name" value="{{$profile->name}}" class="form-control">
	    </div>

	    <div class="form-group">
	      <label for="name">Apellido</label>
	      <input type="text" name="lastname" value="{{$profile->lastname}}" class="form-control">
	    </div>

		<div class="alert alert-danger">
	    	Los cambios que hagas pueden tardar de 5 a 10 minutos en actualizarse correctamente!
    	</div>

	    <input type="submit" value="Guardar" class="btn btn-info">
    </form>
@endsection