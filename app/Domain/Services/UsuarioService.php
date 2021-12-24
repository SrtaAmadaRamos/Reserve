<?php

namespace App\Domain\Services;

use App\Data\Models\Usuario;
use App\Domain\Interfaces\Services\IUsuarioService;
use Illuminate\Support\Facades\Hash;

class UsuarioService implements IUsuarioService
{
    private Usuario $model;

    public function __construct(Usuario $model)
    {
        $this->model = $model;
    }

    public function obterUsuario(int $id): ?Usuario
    {
        $usuario = Usuario::findOrFail($id);

        return $usuario;
    }

    public function cadastrar(array $dados, bool $senhaPadrao = true, bool $grupoPadrao = false): ?Usuario
    {
        $dados['senha'] = $senhaPadrao
                                ? Hash::make($dados['identificacao'])
                                : Hash::make($dados['senha']);

        if ($grupoPadrao) unset($dados['tipo']);

        if(!$usuario = $this->model->create($dados))
            return null;

        return $this->model->find($usuario->id);
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
