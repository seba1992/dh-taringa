<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PublicController extends Controller
{
    public function indeX() {
    	//En la vista principal muestro los 10 mejores posts a todos los usuarios!
	  	$posts = Post::take(10)->get();
	  	$users = User::take(5)->orderBy('created_at', 'DESC')->get();

	  	return view('public.index')
		  			->with('posts', $posts)
		  			->with('users', $users);
    }
}
