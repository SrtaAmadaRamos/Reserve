<?php

namespace App\Domain\Services;

use App\Data\Models\Sala;
use App\Domain\Interfaces\Services\ISalaService;

class SalaService implements ISalaService
{

    private Sala $model;

    public function __construct(Sala $model)
    {
        $this->model = $model;
    }

    public function obterSala(int $id): ?Sala
    {
        return Sala::findOrFail($id);
    }

    public function cadastrar(array $dados): ?Sala
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
