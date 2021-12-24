<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nome
 * @property int $numero
 * @property int $responsavel_id
 * @property int $bloco_id
 */

class Sala extends Model
{
    protected $table = "sala";

    protected $fillable = [
        'nome',
        'numero',
        'responsavel_id',
        'bloco_id',
    ];

}
