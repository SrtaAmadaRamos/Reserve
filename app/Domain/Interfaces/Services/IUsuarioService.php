<?php

namespace App\Domain\Interfaces\Services;

use App\Data\Models\Usuario;

interface IUsuarioService
{
    function obterUsuario(int $id): ?Usuario;
    function cadastrar(array $dados): ?Usuario;
    function editar(int $id, array $dados): bool;
    function excluir(int $id): bool;
}
