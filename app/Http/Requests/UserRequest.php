<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /*
        * Por defecto el valor que viene es false ç, para utilizarlo lo cambiamos a true
        */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /*
    * retorma un arreglo, y definimos las reglas:
    * vamos a indicar que el campo name sea requerido es decir que no sea vacio y que sea minimo de 4 y un maximo de 120 caracteres.

    Para ver la documentacion ponemos en el buscador la palabra Request

    Para indicar que el campo es unico debemos utilizar la instrucción unique:[tabla] e indicar la tabla 
    */
    public function rules()
    {
        return [
            'name'  => 'min:4|max:120|required',
            'email' => 'min:4|max:120|unique:users|required',
            'password' => 'min:4|max:120|required'
        ];
    }
}
