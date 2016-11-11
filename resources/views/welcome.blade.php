@extends('base')
@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Taringa!
                </div>

                {{-- Muestro un listado de posts de todos los usuarios --}}
                <div class="posts" style="text-align:left">
                  <h2>Listado de posts</h2>

                  @foreach($posts as $post)
                    <div class="post" style="text-align:left;">
                      {{$loop->iteration}}) {{$post->title}}
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
