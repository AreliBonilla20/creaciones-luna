<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' => 'required|max:250|string',
            'section_id' => 'required',
            'description' => 'required|max:1000|string',
            'conditions' => 'required|max:1000|string',
            'amount_people' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {   
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'La cantidad máxima de caracteres es 250',
            'name.string' => 'Debe ser una cadena de caracteres',

            'section_id.required' => 'El campo categoría es obligatorio',

            'description.required' => 'El campo descripción es obligatorio',
            'description.max' => 'La cantidad máxima de caracteres es 1000',
            'description.string' => 'Debe ser una cadena de caracteres',

            'conditions.required' => 'El campo condiciones es obligatorio',
            'conditions.max' => 'La cantidad máxima de caracteres es 1000',
            'conditions.string' => 'Debe ser una cadena de caracteres',

            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'Debe ser un dato numérico',
            'price.min' => 'Debe ser mayor a $0.00',

            'amount_people.required' => 'El campo cantidad de personas es obligatorio',
            'amount_people.numeric' => 'Debe ser un dato numérico',
            'amount_people.min' => 'Debe ser mayor a 0',
        ];
    }
}
