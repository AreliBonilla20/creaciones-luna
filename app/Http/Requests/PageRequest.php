<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'description_header' => 'required|string|max:250',
            'who_we_are' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'description_header.required' => 'El campo descripción del encabezado es obligatorio',
            'description_header.string' => 'Debe ser una cadena de caracteres',
            'description_header.max' => 'La cantidad máxima de caracteres es 250',

            'who_we_are.required' => 'El campo quienes somos del encabezado es obligatorio',
            'who_we_are.string' => 'Debe ser una cadena de caracteres',
           
        ];
    }
}
