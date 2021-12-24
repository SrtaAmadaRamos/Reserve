<?php

namespace App\Domain\Interfaces\Services;

use App\Data\Models\Sala;

interface ISalaService
{
    function obterSala(int $id): ?Sala;
    function cadastrar(array $dados): ?Sala;
    function editar(int $id, array $dados): bool;
    function excluir(int $id): bool;
}
