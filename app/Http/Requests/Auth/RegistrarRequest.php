<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistrarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:usuarios',
            'identificacao' => 'required|max:50|unique:usuarios',
            'senha' => ['required', Password::min(8)],
            'senha_confirmation ' => 'confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome deve conter no max 255 caracteres.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um email válido.',
            'email.unique' => 'O email informado já está em uso.',
            'identificacao.required' => 'A identificação é obrigatória.',
            'identificacao.max' => 'A identificação deve conter no max 50 caracteres.',
            'identificacao.unique' => 'A identificação informada já está em uso.',
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve conter no mínimo 8 caracteres.',
            'senha_confirmation.confirmed' => 'As senhas não são iguais.'
        ];
    }
}
