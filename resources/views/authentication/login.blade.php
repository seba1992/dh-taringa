@extends('base')

@section('head')
  @parent

  {{-- Utilizo bootstrap en mi login, sin necesidad de utilizarlo en la pagina principal --}}
  <link rel="stylesheet" href="css/app.css">
@endsection

@section('content')
  {{-- Divido el formulario en una nueva vista dentro de components, porque puede que ademas de tener una pagina que solo me muestre el formulario de login (que seria esta), quiera que el formulario se incluya en alguna otra vista que tenga otras cosas.
  Esa otra vista en lugar de incluir esta vista, incluiria la vista authentication.components.login --}}
  @include('authentication.components.login')
@endsection