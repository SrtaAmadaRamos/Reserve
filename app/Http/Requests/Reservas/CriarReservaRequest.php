<?php

namespace App\Http\Requests\Reservas;

use Illuminate\Foundation\Http\FormRequest;

class CriarReservaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sala_id' => 'required|exists:salas,id',
            'data' => 'required|date|after:today',
            'horarioEntrada' => 'required',
            'horarioSaida' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'sala_id.required' => 'O campo sala é obrigatório.',
            'sala_id.exists' => 'Sala inválida.',
            'data.required' => 'O campo data é obrigatório.',
            'data.after' => 'O campo data deve ser após a data atual.',
            'horarioEntrada.required' => 'O campo horário entrada é obrigatório.',
            'horarioSaida.required' => 'O campo horário saida é obrigatório.',
        ];
    }
}
