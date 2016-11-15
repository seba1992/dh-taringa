<div class="panel panel-default">
  <div class="panel-heading">
    Top posts!
  </div>
  <div class="panel-body">
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

  </div>
</div>
