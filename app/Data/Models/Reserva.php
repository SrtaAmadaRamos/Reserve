<?php

namespace App\Data\Models;

use DateTime;
/**
 * @property integer $id
 * @property int $numero
 * @property int $responsavel_id
 * @property int $bloco_id
 * @property int $usuario_id
 * @property dateTime $data
 * @property dateTime $horarioEntrada
 * @property dateTime $horarioSaida
 */

class Reserva
{
    protected $fillable = [
        'responsavel_id',
        'bloco_id',
        'usuario_id',
        'data',
        'horarioEntrada',
        'horarioSaida',

    ];
}
