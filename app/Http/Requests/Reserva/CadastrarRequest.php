<?php

namespace App\Http\Requests\Reserva;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return string[]
     */
    public function authorize()
    {
        return [
            'data' => 'required',
            'horarioEntrada' => 'required',
            'horarioSaida' => 'required'
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
            'data.required' => 'O nome é obrigatório.',
            'horarioEntrada.required' => 'O nome é obrigatório.',
            'horarioSaida.required' => 'O nome é obrigatório.',
        ];
    }
}
