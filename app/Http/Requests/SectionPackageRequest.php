<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionPackageRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'description' => 'string|max:500'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'Debe ser una cadena de caracteres',
            'name.max' => 'La cantidad máxima de caracteres es 250',

            'description.string' => 'Debe ser una cadena de caracteres',
            'description.max' => 'La cantidad máxima de caracteres es 500'
        ];
    }
}
