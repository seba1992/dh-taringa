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
	 * Muestra la pagina principal que ve un usuario cuando se loguea
	 */
	public function index() {
		return view('users.index');
	}
	/**
     * Muestra el panel de alta/baja/modificacion de posts de un usuario especifico
     */
    public function displayPosts() {

    	//En la vista no está mal utilizar directamente Auth::user() para mostrar data del usuario, pero para dar información relacionada al usuario (como los posts) debemos irla a buscar en el controlador (o en un repositorio) y pasarsela a la vista

    	//Si quisiera pasarle a la vista los posts paginados seria:
    	// Auth::user()->posts()->paginate(3) <- con los parentesis despues de posts
    	$posts = Auth::user()->posts;

    	return view('users.posts')->with('posts', $posts);
    }

	/**
     * Muestra el panel de configuracion del perfil de un usuario especifico
     */
    public function displayProfile() {
    	return view('users.profile')->with('profile', Auth::user());
    }
}
