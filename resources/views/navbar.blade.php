
{{--
Algo de esta pinta viene por defecto en welcome.blade.php, lo que hace es preguntar si existe una ruta con el nombre login, es decir, si nuestro sistema tiene autenticacion, y en ese caso muestra diferentes cosas segun estemos logueados o no.

Sirve solo a modo de ejemplo preguntar si una ruta existe, no creo que sea algo que esté bueno utilizar en nuestros proyectos.
--}}


@if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
            <a href="#">({{ Auth::user()->name }})</a>
        @endif

        @if(!Request::is('/'))
            <a href="{{ url('/') }}">Inicio</a>
        @endif

        @if(Auth::check())
            <a href="{{ url('/mis-posts') }}">Mis posts</a>
            <a href="{{ url('/mi-perfil') }}">Perfil </a>
            <a href="{{ route('logout') }}">Salir</a>
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
@endif