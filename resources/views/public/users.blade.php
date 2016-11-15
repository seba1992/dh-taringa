<div class="panel panel-default">
  <div class="panel-heading">
    Ultimos usuarios!
  </div>
  <div class="panel-body">

      @if($users->count() > 0)
        {{-- Muestro un listado de posts de todos los usuarios --}}
        <ul>
          @foreach($users as $user)
            <li>
              <a href="#">
                {{$user->name}}
              </a>
            </li>
          @endforeach
        </ul>
      @else
        <div>
          No hay usuarios aun :(
        </div>

        <div>
          <s>¿Ejecutaste php artisan migrate:refresh --seed?</s>
        </div>
      @endif
  </div>
</div>