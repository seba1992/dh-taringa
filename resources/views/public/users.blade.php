<div class="panel panel-default">
  <div class="panel-heading">
    Ultimos usuarios!
  </div>
  <div class="panel-body">
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
  </div>
</div>