<?php

namespace App\Domain\Services;

use App\Data\Models\Reserva;
use App\Domain\Interfaces\Services\IReservaService;
class ReservaService implements IReservaService
{

    private Reserva $model;

    public function __construct(Reserva $model)
    {
        $this->model = $model;
    }

    public function obterReserva(int $id): ?Reserva
    {
        return Reserva::findOrFail($id);
    }

    public function cadastrar(array $dados): ?Reserva
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
