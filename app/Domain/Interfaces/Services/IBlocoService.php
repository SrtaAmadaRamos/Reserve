<?php

namespace App\Domain\Interfaces\Services;

use App\Data\Models\Bloco;

interface IBlocoService
{
    function obterBloco(int $id): ?Bloco;
    function cadastrar(array $dados): ?Bloco;
    function editar(int $id, array $dados): bool;
    function excluir(int $id): bool;
}
