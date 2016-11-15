@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      @include('public.posts')
    </div>
      
    <div class="col-md-6 hidden-sm">
      @include('auth.components.login')
    </div>

    <div class="clearfix"></div>

    <div class="col-xs-12 col-md-6">
      @include('public.users')
    </div>
  </div>
@endsection
