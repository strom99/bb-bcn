<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
            'author' => 'required|max:255',
            'isbn' => 'required|max:255',
            'description' => 'required|min:3',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título del libro es obligatorio.',
            'title.min' => 'Campo minimo de 10 letras',
            'title.max' => 'El campo maximo es de 255 letras',
            'author.required' => 'El autor del libro es obligatorio.',
            'author.max' => 'El campo maximo es de 255 letras',
            'isbn.required' => 'El ISBN es obligatorio',
            'published_date.required' => 'La fecha de publicación del libro es obligatoria.',
            'description.required' => 'La descripcion del libro es obligatoria.',
            'description.min' => 'Escribe una descripcion minima de 20 caracteres',
            'price.required' => 'El precio del libro es obligatorio.',
            'price.numeric' => 'El precio debe ser un número válido.',
            'price.min' => 'El precio debe ser mayor o igual a cero.',
        ];
    }
}
