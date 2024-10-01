<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre'=>['required', 'min:8'],
            'description'=>['required', 'min:8'],
            'surface'=>['required','integer', 'min:10'],
            'chambre'=>['required','integer','min:1'],
            'nbre_piece'=>['required','integer','min:0'],
            'etage'=>['required','integer','min:0'],
            'prix'=>['required','integer','min:0'],
            'ville'=>['required','min:8'],
            'adresse'=>['required','min:8'],
            'code_postal'=>['required','min:2'],
            'vendue'=>['required','boolean'],
            'options'=>['array', 'exists:options,id', 'required']
        ];
    }
}
