<div class="panel panel-default">
  <div class="panel-heading">
    Top posts!
  </div>
  <div class="panel-body">

      @if($posts->count() > 0)
        {{-- Muestro un listado de posts de todos los usuarios --}}
        <ul>
          @foreach($posts as $post)
            <li>
              <a href="#">
                {{str_limit($post->title, 45)}} 
                ({{$post->user->name}})
              </a>
            </li>
          @endforeach
        </ul>
      @else
        <div>
          No hay ningun post aun :(
        </div>

        <div>
          <img src="{{asset('img/sorry.jpg')}}" style="max-width:100%; max-height:100%">
        </div>

        <div>
          <s>¿Ejecutaste php artisan migrate:refresh --seed?</s>
        </div>
      @endif
  </div>
</div>
