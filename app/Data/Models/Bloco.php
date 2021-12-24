<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nome
 * @property string $numero
 * @property string $coordenador
 */

class Bloco extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'coordenador',
    ];
}
