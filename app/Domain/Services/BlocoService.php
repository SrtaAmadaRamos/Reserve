<?php

namespace App\Domain\Services;

use App\Data\Models\Bloco;
use App\Domain\Interfaces\Services\IBlocoService;

class BlocoService implements IBlocoService
{
    private Bloco $model;

    public function __construct(Bloco $model)
    {
        $this->model = $model;
    }

    public function obterBloco(int $id): ?Bloco
    {
        return Bloco::findOrFail($id);
    }

    public function cadastrar(array $dados): ?Bloco
    {
        return $this->model->create($dados);
    }

    function editar(int $id, array $dados): bool
    {
        return $this->model
            ->query()
            ->whereKey($id)
            ->update($dados);
    }

    function excluir(int $id): bool
    {
        return $this->model
            ->query()
            ->whereKey($id)
            ->delete();
    }
}
