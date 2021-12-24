<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer $id
 * @property string $nome
 * @property int $numero
 * @property int $responsavel_id
 * @property int $bloco_id
 */

class Sala extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'responsavel_id',
        'bloco_id',
    ];

    public function bloco(): BelongsTo
    {
        return $this->belongsTo(Bloco::class);
    }

    public function responsavel(): HasOne
    {
        return $this->hasOne(Usuario::class, 'id', 'responsavel_id');
    }
}
