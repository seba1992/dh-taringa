<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//Nunca jamas pongo las claves foraneas en el atributo fillable, esto puede terminar en un severo bug de seguridad, siempre las defino en las relationships que correspondan!
    protected $fillable = ['title', 'content']; 

    /**
     * Defino la relacion entre un post y un usuario
     * 
     * En este caso le digo que un post puede pertenecer a un solo usuario.
     * 
     * Notar que no tengo que especificarle la clave foranea user_id ni el nombre de la tabla users
     * porque al crear las tablas segui las convenciones, tanto en los nombres de tablas como en
     * los nombres de las claves foraneas!
     */ 
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
