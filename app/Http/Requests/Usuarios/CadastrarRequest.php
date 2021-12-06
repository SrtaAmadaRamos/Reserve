<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CadastrarRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:2',
            'email' => 'required|email|unique:usuarios',
            'identificacao' => 'required|unique:usuarios',
            'tipo' => ['required', Rule::in([1, 2])]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O nome tem que no mínimo 2 caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Informe um email válido.',
            'email.unique' => 'O email informada já está em uso.',
            'identificacao.required' => 'A identificacao é obrigatório.',
            'identificacao.unique' => 'A identificacao informada já está em uso.',
            'tipo.required' => 'O tipo é obrigatório.',
            'tipo.in' => 'O tipo informado é inválido.',
        ];
    }
}
