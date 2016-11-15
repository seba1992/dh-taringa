<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use App\User;

Route::get('/', function() {
  //En la vista principal muestro los 10 mejores posts a todos los usuarios!
  $posts = App\Post::take(10)->get();
  $users = App\User::take(5)->orderBy('created_at', 'DESC')->get();

  return view('public.index')
  			->with('posts', $posts)
  			->with('users', $users);
});

//Agrupo todas las rutas a las que no se puede acceder sin estar logueado para
//no tener que especificarles el middleware 
Route::group(['middleware'=>'auth'], function() {
  //Notar que en estas rutas ya no uso el user_id como uno de los parametros ya que obtengo el usuario a traves de Auth::user(). 
  Route::get('mis-posts', 'HomeController@displayPosts');
  Route::get('mi-perfil', 'HomeController@displayProfile');
  //Route::get('mi-config', 'HomeController@displayconfig');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
