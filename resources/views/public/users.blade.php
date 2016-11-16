<div class="panel panel-default">
  <div class="panel-heading">
    {{-- 

      Saco el texto a un archivo de idioma para que al cambiar el idioma se cambie solo y poder tener los mensajes concentrados en un solo lugar.

      Ideealmente deberia hacer esto mismo con todos los mensajes de la página
    --}}
    @lang('public.last_users')
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
          <s>¿Ejecutaste php artisan migrate --seed?</s>
        </div>
      @endif
  </div>
</div>