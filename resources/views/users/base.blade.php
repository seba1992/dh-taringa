{{--
	Tengo una plantilla base para las paginas que pueden ver todas las personas, y tengo otra plantilla para las paginas que solo pueden ver los usuarios que estan autenticados.

	Esto serviria en caso de que ambas secciones tengan diseños muy diferentes (lo que es muy habitual)

	En caso de que ambas compartieras muchas cosas en comun, deberia tener una tercer plantilla base, de la cual extendieran las dos
 --}}

@extends('base')

@section('head')
	@parent
	{{-- Al ser la cabecera customizable, me permite por ejemplo solo usar bootstrap en el panel de administracion del usuario --}}
	<link rel="stylesheet" href="css/app.css">
@endsection

@section('title')
	{{-- 
		No pregunto si el usuario está logueado con Auth::check() porque esta vista solamente es para usuarios logueados
	--}}
	Taringa - {{ Auth::user()->name }}
@endsection
	
@section('content')
	<h2>@yield('section_name')</h2>

	<div class="user_content">
		@yield('user_content')
	</div>
@endsection