<?php

namespace App\Domain\Interfaces\Services;

use App\Data\Models\Reserva;

interface IReservaService
{
    function obterReserva(int $id): ?Reserva;
    function cadastrar(array $dados): ?Reserva;
    function editar(int $id, array $dados): bool;
    function excluir(int $id): bool;
}
