<?php

namespace App\Http\Requests\Reserva;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return \string[][]
     */
    public function authorize()
    {
        return [
            'data' => [
                'required',
            ],
            'horarioEntrada' => [
                'required',
            ],
            'horarioSaida' => [
                'required',
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
            //
        ];
    }
}
