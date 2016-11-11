<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Definir el error bag (mochila de errores) me ayuda a mostrar los errores en caso de
     * que tenga varios formularios en una misma página, que tengan nombres de campos que se
     * pisan.
     *
     * Por ejemplo si yo muestro el login y el registro en la misma página, al tener ambos
     * un campo llamado email, si en ambos formularios yo preguntara si me llegó algún error
     * del campo email: $errors->has('email'), no podria diferenciar en cual de los
     * formularios tengo que mostrar el mensaje, y se mostraria en ambos!!
     *
     * Al definir el errorBag, en lugar de acceder a los errores como $errors->all(), 
     * accedo a los errores como $errors->register->all(), donde register es el nombre que
     * le puse a mi errorBag, y de esta forma ya no se pisan
     * 
     */
    protected $errorBag = 'register';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //!!! No olvidarse de devolver true si no queremos toparnos con un mensaje de Forbidden!!!
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    /**
     * Defino mensajes custom para mis errores, ya que los que vienen por defecto son demasiado genericos para algo tan importante como el registro!!
     */
    public function messages() {
        return [
            'name.required'      => 'No hay nombre, no hay cuenta',
            'lastname.required'  => 'Habilitame el apellido o no vas a tener cuenta',
            'email.required'     => 'Poneme el email con fé, no te voy a spamear ;P',
            'email.email'        => 'Parece que me querés meter un email fruta',
            'password.required'  => 'Sin contraseña estamos al horno'
        ];
    }
}
