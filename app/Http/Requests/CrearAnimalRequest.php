<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'especie' => 'required:min:3',
            'altura' => 'required',
            'peso' => 'required',
            'fechaNacimiento' => 'required',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,svg'
        ];
    }

    public function messages()
    {
        return [
            'especie.required' => 'el nombre es obligatorio',
            'altura.required' => 'La altura es obligatoria',
            'peso.required' => 'El peso es obligatorio',
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'imagen.required' => 'La imagen es obligatoria',
            'imagen.mimes' => 'El formato de la imagen no es valido',
        ];
    }

}
