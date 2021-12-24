<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $numero
 * @property string $coordenador
 */

class Bloco extends Model
{
    protected $fillable = [
        'name',
        'numero',
        'coordenador',
    ];
}
