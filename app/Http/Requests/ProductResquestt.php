<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductResquestt extends FormRequest
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
            //campo a validar

        'nombre_producto' =>'required' ,
        //'descripcion_prod' =>'required',
        //"imagen_producto",
        'cantidad_producto'=>'required',
        'fecha_producto'=>'required',
        'precio'=>'required',
        'fecha_ven_producto'=>'required',
        ];
    }
}
