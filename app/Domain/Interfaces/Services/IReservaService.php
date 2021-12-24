<?php

namespace App\Domain\Interfaces\Services;

use App\Data\Models\Reserva;
use Illuminate\Database\Eloquent\Collection;

interface IReservaService
{
    function obterReservasParaHome(int $limit): Collection;
    function cadastrar(array $dados): ?Reserva;
}
