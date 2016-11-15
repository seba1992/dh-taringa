@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
      {{-- Muestro un listado de posts de todos los usuarios --}}
      <div class="posts" style="text-align:left">
        <h2>Top Posts!</h2>

        <ul>
          @foreach($posts as $post)
            <li>
              <a href="#">{{$post->title}}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
