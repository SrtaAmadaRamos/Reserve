<?php

namespace App\Data\Models;

/**
 * @property integer $id
 * @property string $nome
 * @property int $numero
 * @property int $responsavel_id
 * @property int $bloco_id
 */

class Sala
{
    protected $fillable = [
        'nome',
        'numero',
        'responsavel_id',
        'bloco_id',
    ];

}
