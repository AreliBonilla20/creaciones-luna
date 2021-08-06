<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:150|string',
            'description' => 'required|max:500|string',
            'price' => 'required|numeric|min:0',
            'url_image' => 'required',
            'available' => 'required'
        ];
    }

    public function messages()
    {   
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'La cantidad máxima de caracteres es 150',
            'name.string' => 'Debe ser una cadena de caracteres',

            'description.required' => 'El campo descripción es obligatorio',
            'description.max' => 'La cantidad máxima de caracteres es 500',
            'description.string' => 'Debe ser una cadena de caracteres',

            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'Debe ser un dato numérico',
            'price.min' => 'Debe ser mayor a $0.00',
            
            'url_image.required' => 'El campo imagen es obligatorio',

            'available.required' => 'El campo existencia es obligatorio'
        ];
    }
}
