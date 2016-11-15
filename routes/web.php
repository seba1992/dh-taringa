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

Route::get('/', 'PublicController@index');

//Agrupo todas las rutas a las que no se puede acceder sin estar logueado para
//no tener que especificarles el middleware 
Route::group(['middleware'=>'auth'], function() {
  //Notar que en estas rutas ya no uso el user_id como uno de los parametros ya que obtengo el usuario a traves de Auth::user(). 
  Route::get('mis-posts', 'HomeController@displayPosts');
  Route::get('mi-perfil', 'HomeController@displayProfile');
  //Route::get('mi-config', 'HomeController@displayconfig');
});


/**
 * Por defecto cuando creamos un nuevo proyecto de larave, aunque no ejecutemos
 * php artisan make:auth tenemos en la app/Http/Controllers/Auth los controladores
 * necesarios tanto para el registro, el login y la recuperación de contraseña.
 *
 * Para poder aprovechar toda esa lógica y no tener que codearla desde cero debemos
 * definir las rutas que utilicen los métodos de dichos controllers.
 *
 * Bien podemos tener un conocimiento exhaustivo de esos controladores, o podemos
 * simplemente poner Auth::routes() y genera todas las rutas apuntando a los métodos
 * que corresponden de cada uno de los controladores automaticamente!!
 *
 * Solamente nos serviria hacerlo a mano en caso de que quisieramos de que
 * quisieramos modificar los paths de dichas rutas. Por ejemplo si quisieramos 
 * que al registro se entre desde /nueva-cuenta pondriamos lo siguiente
 *
 * Route::get('nueva-cuenta', 'Auth/LoginController@showLoginForm')
 * Para ver las rutas que nos agrega Auth::routes() en consola debemos poner
 * php artisan route:list
 *
 * ------------------------------------------
 *
 * Para poder utilizar la recuperación de contraseña acordate que tenés
 * que configurar las credenciales de tu cuenta de gmail (u otro servicio) 
 * en el .env!
 */
Auth::routes();

Route::get('/home', 'HomeController@index');
