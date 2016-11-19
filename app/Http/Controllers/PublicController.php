<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PublicController extends Controller
{
	/**
	 * Este controlador está pensando para poner rutas que no requiren
	 * de autenticación (rutas públicas)
	 */
	
	/**
	 * Muestra la pagina inicial
	 */
    public function index() {
    	//En la vista principal muestro los 10 mejores posts a todos los usuarios!
    	
    	//Obtiene los Top posts, mirate el método scopeTop en el modelo Post
	  	$posts = Post::top()->get(); 
	  	$users = User::take(5)->orderBy('created_at', 'DESC')->get();

	  	return view('public.index')
		  			->with('posts', $posts)
		  			->with('users', $users);
    }

    /**
     * Muestra una vista con información del proyecto
     */
    public function showHelp() {
    	return view('public.help');
    }
}
