<?php

namespace App\Http\Requests\Blocos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditarRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('blocos')->ignore($this->id)
            ],
            'numero' => [
                'required', 'integer',
                Rule::unique('blocos')->ignore($this->id)
            ],
            'coordenador' => 'required|max:255'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'O nome já está em uso.',
            'numero.required' => 'O número é obrigatório.',
            'numero.unique' => 'O número informado já está em uso.',
            'numero.integer' => 'O valor para número deve ser um inteiro.',
            'coordenador.required' => 'A coordenador é obrigatório.',
            'coordenador.max' => 'O campo coordenador deve conter no max 255 caracteres.',
        ];
    }
}
