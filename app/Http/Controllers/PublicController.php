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
	  	$posts = Post::take(10)->get();
	  	$users = User::take(5)->orderBy('created_at', 'DESC')->get();

	  	return view('public.index')
		  			->with('posts', $posts)
		  			->with('users', $users);
    }

    /**
     * Muestra una vista con información del proyecto
     */
    public function showInfo() {
    	return view('public.info');
    }
}
