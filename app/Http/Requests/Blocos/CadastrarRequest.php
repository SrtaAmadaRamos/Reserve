<?php

namespace App\Http\Requests\Blocos;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|unique:blocos',
            'numero' => 'required|unique:blocos|integer',
            'coordenador' => 'required|max:255'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'O nome já está em uso.',
            'numero.required' => 'O número é obrigatório.',
            'numero.unique' => 'O número informado já está em uso.',
            'numero.integer' => 'O valor para número deve ser um inteiro.',
            'coordenador.required' => 'A coordenador é obrigatório.',
            'coordenador.max' => 'O campo coordenador deve conter no max 255 caracteres.',
        ];
    }
}
