@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Información del proyecto</div>

            <div class="panel-body">
                <ul>
                	<li>
                		<p>
                			Para empezar configurate una BD <b>nueva</b> y ejecutá <i>php artisan migrate --seed</i>, lo cual te va a crear usuarios y posts
            			</p>
        			</li>
        			<li>
                		<p>
                			Para seedear los posts se usa 
                			<a href="https://github.com/fzaninotto/Faker">Faker</a> (Dónde? Cómo?). 
                            Para seedear los usuarios se hace con artimañas (Cuáles?).
            			</p>
            		</li>
            		<li>
            			<p>
            				El formulario de login puede verse tanto en la <a href="/">página principal</a> como en <a href="{{route('login')}}">/login</a> -- <i>Solo estando deslogueado</i>
        				</p>
        			</li>
                	<li>
                		<p>
                            {{-- Sep, estan hardcodeadisimas las URLs de prueba de subdominios --}}
                			El formulario de login puede verse en ingles o en español en base al subdominio:<br/>
                			<a href="http://es.localhost:8000">http://es.localhost:8000</a>, <a href="http://en.localhost:8000">http://en.localhost:8000</a>
            			</p>
        			</li>
        			<li>
        				<p>
        					Se utilizó el comando <i>php artisan make:auth</i> aprovechando tanto la logica de los controladores de la carpeta<br/> <i>app/Http/Controllers/Auth</i>, como las vistas y las rutas generadas por el comando
        				</p>
        			</li>

                    <li>
                        <p>
                            Podes subirte una imagen desde tu perfil, la misma se almacena en la carpeta storage/app/public
                        </p>
                    </li>

                    <li>
                        <p>
                            Para que te funcione el recuperador de contraseña acordate de configurar el .env con las credenciales de tu cuenta de gmail (o cualquier otro servicio)

                            <blockquote>
                                MAIL_HOST=smtp.gmail.com<br>
                                MAIL_PORT=587<br>
                                MAIL_USERNAME=mi-cuenta-de@gmail.com<br>
                                MAIL_PASSWORD=mi-contraseña-de-gmail<br>
                                MAIL_ENCRYPTION=tls<br>
                            </blockquote>
                        </p>
                    </li>

                    <li>
                        <p>
                            Para poder utilizar los iconos de bootstrap copiate la carpeta public/fonts a tu proyecto
                        </p>
                    </li>
        		</ul>
            </div>
        </div>
    </div>
</div>
@endsection