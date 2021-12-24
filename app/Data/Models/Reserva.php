<?php

namespace App\Data\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer $id
 * @property int $numero
 * @property int $sala_id
 * @property int $usuario_id
 * @property dateTime $data
 * @property dateTime $horarioEntrada
 * @property dateTime $horarioSaida
 */

class Reserva extends Model
{
    protected $fillable = [
        'sala_id',
        'usuario_id',
        'data',
        'horarioEntrada',
        'horarioSaida'
    ];

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }

    public function getHorarioEntradaFormatado(): string
    {
        return date('H:i', $this->horarioEntrada);
    }

    public function getHorarioSaidaFormatado(): string
    {
        return date('H:i', $this->horarioSaida);
    }

    protected $casts = [
        'data' => 'date',
        'horarioEntrada' => 'timestamp',
        'horarioSaida' => 'timestamp',
    ];
}
