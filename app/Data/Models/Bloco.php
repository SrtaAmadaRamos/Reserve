<?php

namespace App\Data\Models;

/**
 * @property integer $id
 * @property string $nome
 * @property string $coordenador
 */

class Bloco
{
    protected $fillable = [
        'nome',
        'coordenador',
    ];
}
