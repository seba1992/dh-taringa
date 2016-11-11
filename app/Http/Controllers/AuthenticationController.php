<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use Auth;

class AuthenticationController extends Controller
{
	/**
	 * Muestra una vista que SOLO tiene el formulario de login
	 */
    public function showLoginForm() {
    	return view('authentication.login');
    }

    /**
     * Autentica un usuario en caso de que las credenciales suministradas sean validas!
     */
    public function login(Request $request) {
    	/**
    	 * El método validateWithBag es exactmente igual que el método validate, 
    	 * solamente que me permite setear un nombre a los mensajes de error. 
    	 * De esta forma en la vista en lugar de acceder como $errors->all(), 
    	 * $errors->has(...), etc accedo como $errors->login->all(), 
    	 * $errors->login->has(...), etc.
    	 *
    	 * Esto es particularme útil cuando tenemos mas de un formulario en una misma
    	 * página, y dichos formularios tienen campos que tienen el mismo nombre. Por
    	 * ejemplo el formulario de login y de registro tienen ambos el campo email. 
    	 *
    	 * Si no se le seteara un nombre al conjunto de errores, no podria diferenciar en 
    	 * la vista de cual de los formularios es el error, y se mostraria erroneamente el
    	 * alert en ambos formularios.
    	 *
    	 * Esto se puede hacer tambien en un FormRequest seteando el atributo protected
    	 * $errorBag (Ver App\Http\Requests\RegisterRequest)
    	 */
        $this->validateWithBag('login', $request, [
            'email' => 'required', 'password' => 'required',
        ]);

		/**
		 * La clase Auth es la que nos permite manejar de forma sencilla la autenticación
		 * de usuarios
		 * 
		 * El método attempt de la clase Auth realiza dos tareas:
		 * 
		 * Va a buscar un usuario a la tabla users con las credenciales que nosotros le
		 * pasemos y en caso de que las credenciales sean correctas, realiza 2 acciones:
		 * 
		 * 1) Persiste al usuario en la sesion por lo que ya queda logueado hasta que
		 * yo llame a Auth::logout(); o expire la sesión
		 *
		 * 2) Devuelve true para que sepamos que sucedió
		 *
		 * En caso de que no haya un usuario con las credenciales especificadas devuelve false
		 */
		
		$loginExitoso = Auth::attempt(
			[
				'email'		=>	$request->email, 
				'password'	=>	$request->password
			]);

		/**
		 * Si el usuario se logueó, lo mando al panel de administración
		 *
		 * El método intended hace que en caso de que redirija al usuario a la ruta a la que intentó acceder y fue trabado por no haber estado logueado. En caso de que haya entrado intencionalmente a /login lo manda a la ruta que le especifiquemos
		 */
	  	if($loginExitoso)
	    	return redirect()->intended('/admin/clientes');
    
    	/*
    	 * En caso contrario lo mando a la pagina anterior y le muestro el error
    	 */
  		return redirect()->back()
    		->withErrors('El email o la contraseña no son correctos', 'login');
    }

    /**
	 * Muestra una vista que SOLO tiene el formulario de registro
	 */
    public function showRegisterForm() {
    	return view('authentication.register');
    }

    /**
     * Se crea la nueva cuenta del usuario solo en caso de que la información suministrada
     * pase mis reglas de validación (Definidas en RegisterRequest)
     */
    public function register(RegisterRequest $request) {
    	//Como la información ingresada en el formulario es válida (Mirate RegisterRequest), paso a crear el usuario directamente
		  $user = User::create([
		    'name' 		=> $request->name,
		    'lastname'	=> $request->lastname,
		    'email' 	=> $request->email,
		    'password'  => bcrypt($request->password),
		  ]);

		  /*
		   * En lugar de utilizar Auth::attempt(...), como ya se que usuario es el que quiero
		   * que se autentique, utilizo directamente el método login. 
		   * 
		   * ¿Por que necesito realizar la autenticacion despues de crear la cuenta?
		   */
		  Auth::login($user);

		  /**
		   * Lo redirijo a una pagina solo accesible para los usuarios autenticados
		   */
		  return redirect('/');
    }

    /**
     * Desloguea el usuario logueado
     */
    public function logout() {
    	Auth::logout(); //Si, asi de facil!
    	return redirect('/');
    }
}
