<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
	/**
	 * A pesar de que por ahora tenemos el manejo de todas las secciones del usuario
	 * en un solo controlador, idealmente a medida que fueramos desarrollando cada una se irian separando en mas controllers, por ejemplo: 
	 *
	 * UserPostsController (con los metodos index, show, edit, store, update, etc)
	 * UserConfigController (con los metodos index, update, etc)
	 * UserProfileController (con los metodos show, update, etc)
	 * 
	 */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * Asi como podiamos agregar middlewares en las rutas, 
         * al especificarlo en el constructor de cualquier controlador
         * lo que estamos diciendo es que para entrar a cualquier de los métodos
         * de dicho controlador, primero tiene que pasar por el middleware
         * especificado. En este caso significa que no se pueden mirar posts,
         * editar el perfil, o mirar la home si no se está autenticado
         *
         * Mas información sobre esto: 
         * https://laravel.com/docs/5.3/controllers#controller-middleware
         */
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Muestra la pagina inicial que ve un usuario cuando se loguea
         * Por defecto muestra la vista home, pero yo la moví adentro de la
         * carpeta panel por lo que el nuevo path es panel.home
         */
        return view('panel.home');
    }	

	/**
     * Muestra el panel de alta/baja/modificacion de posts de un usuario especifico
     */
    public function displayPosts() {

    	//En la vista no está mal utilizar directamente Auth::user() para mostrar data del usuario, pero para dar información relacionada al usuario (como los posts) debemos irla a buscar en el controlador (o en un repositorio) y pasarsela a la vista

    	//Si quisiera pasarle a la vista los posts paginados seria:
    	// Auth::user()->posts()->paginate(3) <- con los parentesis despues de posts
    	$posts = Auth::user()->posts;

    	return view('panel.posts')->with('posts', $posts);
    }

	/**
     * Muestra el panel de configuracion del perfil de un usuario especifico
     */
    public function displayProfile() {
    	return view('panel.profile')->with('profile', Auth::user());
    }
}

