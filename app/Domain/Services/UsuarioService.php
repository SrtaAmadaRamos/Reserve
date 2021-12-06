<?php

namespace App\Domain\Services;

use App\Data\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService implements \App\Domain\Interfaces\Services\IUsuarioService
{
    private Usuario $model;

    public function __construct(Usuario $model)
    {
        $this->model = $model;
    }

    public function cadastrar(array $dados): ?Usuario
    {
        $dados['senha'] = Hash::make($dados['identificacao']);

        return $this->model->create($dados);
    }

    public function editar(int $id, array $dados): bool
    {
        return $this->model
                    ->query()
                    ->whereKey($id)
                    ->update($dados);
    }

    public function excluir(int $id): bool
    {
        return $this->model
                    ->query()
                    ->whereKey($id)
                    ->delete();
    }
}
