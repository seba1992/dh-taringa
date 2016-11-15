<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Taringa!
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">@lang('login.title')</a></li>
                    <li><a href="{{ url('/register') }}">@lang('register.title')</a></li>
                @else
                        {{-- Agrego a la barra de navegación los items que tenia en mi proyecto inciialmente --}}
                        <li>
                            <a href="{{ url('/mis-posts') }}">Mis posts</a>
                        </li>
                        <li>
                            <a href="{{ url('/mi-perfil') }}">Perfil </a>
                        </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        {{-- 

                            ATENTO CON ESTO 

                            La ruta de logout es por post, por lo que es necesario tener un formulario para el envio. Aca la artimaña que se usa para tener un link es tener un formulario oculto y al hacer click en el link "Logout" se envia el formulario

                        --}}
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="{{ route('information') }}" title="Info sobre el proyecto">
                        <span class="glyphicon glyphicon-info-sign hidden-xs" title="Ver información del proyecto"></span> 
                        <span class="visible-xs">Información</span> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>