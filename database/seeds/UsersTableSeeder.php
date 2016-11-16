<?php

use Illuminate\Database\Seeder;

//Si uso una clase, no me puedo olvidar de importarla con el nombre completo!!!
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Ejercicio: Hacer este seeder usando Faker (mirar PostsTableSeeder)
         */
        if(User::count() > 0 )
	      	throw new Exception("Ya hay usuarios en la tabla! Ejecutá php artisan migrate:refresh --seed si queres borrar todas tus tablas, volverlas a crear y seedearla nuevamente");
    	/*
    	 * Creo una coleccion de nombres en lugar de un vector para aprovechar el método random que me permite tomar un elemento aleatorio:
    	 *
    	 * $nombres->random(1) //Obtiene un solo elemento
    	 *
    	 * No utilizo $nombres->shuffle()->first() porque segun la cantidad de nombres esto podria terminar siendo muy poco performante, mucho cuidado con shuffle!!
    	 *
    	 * Ver más métodos en: https://laravel.com/docs/5.3/collections
    	 */
    	$nombres = collect(['Juan', 'Analia', 'Teresa', 'Florencia', 'Hernando', 'Esteban']);

    	/*
    	 * Hago lo mismo con apellidos para poder obtener despues uno aleatorio
    	 */
    	$apellidos = collect(['Hernandez', 'Chavez', 'Pereyra', 'Gonzalez', 'Mazzoccone', 'Farias']);

    	/*
    	 * No es necesario que cree listas para cada una de las cosas que quiero utilizar, simplemente es para mostrar que si quiero que la data generada sea veridica puedo hacerlo con muy poco laburo! Si te fijas el 90% de este código son comentarios!
    	 */
    	$dominios = collect(['hotmail.com', 'yahoo.com.ar', 'gmail.com']);

    	/**
    	 * Genero 100 usuarios falsos!
    	 */
    	for($i=0; $i < 30; $i++) {
    		//¿Por que guardo el nombre, el apellido y el dominio primero en variables en lugar de utilizarlos directamente?
    		$nombre = $nombres->random(1);
    		$apellido = $apellidos->random(1);
    		$dominio = $dominios->random(1);

    		//Genero un email aleatorio a partir de los datos anteriores.
    		//Para saber que hace el helper str_slug y ver otros helpers para el manejo de strings
    		//https://laravel.com/docs/5.3/helpers#method-str-slug
    		$email = str_slug($nombre.$apellido).rand(1,10000)."@".$dominio; //Agrego un numero aleatorio despues del email para evitar que se repitan y me falle el seeder ya que el email es unique en la tabla users!

	    	User::create([
	          'name'     => $nombre,
	          'lastname' => $apellido,
	          'email'    => $email,
	          'password' => Hash::make('12345678'), 
	        ]);	

	        /*
	        	Tengo que guardar la contraseña con la encriptacion de laravel si o si,
	         	primero y principal por un tema de seguridad, y por otra parte porque al intentar loguearme (con Auth::attempt) laravel no va a poder saber si la contraseña que puso el usuario es correcta o no. 

	         	Usar el helper bcrypt en este caso es lo mismo que Hash::make, pero está bueno usar Hash::make porque me desligo de saber que sistema de encriptacion se está usando internamente

	          	Para mas información:
	          	https://laravel.com/docs/5.3/hashing
	         */
    	}
    }
}
