<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
             //crear las reglas de validación
             'name' => 'required|max:20',
             'last_name' => 'required',
             'email' => 'required|email|unique:users',
             'direccion' => 'required',
             'telefono' => 'required',
             'password' => 'required|confirmed',
        ];
    }
}
