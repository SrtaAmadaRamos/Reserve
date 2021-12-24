<?php

namespace App\Http\Requests\Salas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function authorize()
    {
        return [
            'name' => [
                'required',
                Rule::unique('sala')->ignore($this->id)
            ],
            'numero' => [
                'required', 'integer',
                Rule::unique('sala')->ignore($this->id)
            ],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'O nome já está em uso.',
            'numero.required' => 'O número é obrigatório.',
            'numero.unique' => 'O número informado já está em uso.',
            'numero.integer' => 'O valor para número deve ser um inteiro.',
        ];
    }
}
