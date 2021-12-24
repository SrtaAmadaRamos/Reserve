<?php

namespace App\Http\Controllers;

use App\Data\Models\Usuario;
use App\Domain\Interfaces\Services\IUsuarioService;
use App\Http\Requests\Usuarios\CadastrarRequest;
use App\Http\Requests\Usuarios\EditarRequest;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class UsuarioController extends Controller
{
    private IUsuarioService $usuarioService;

    public function __construct(IUsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = Usuario::query()->paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    public function cadastrarUsuario()
    {
        return view('usuarios.cadastrar');
    }

    public function cadastrarUsuarioPost(CadastrarRequest $request)
    {
        $usuario = $this->usuarioService->cadastrar($request->all());

        if($usuario != null) {
            return redirect('/usuarios')->with('mensagem', 'Usuário cadastrado com sucesso!');
        }

        return back();
    }

    public function editarUsuario(int $id)
    {
        $usuario = $this->usuarioService->obterUsuario($id);
        return view('usuarios.editar', compact('usuario'));
    }

    public function editarUsuarioPost(int $id, EditarRequest $request)
    {
        Usuario::findOrFail($id);

        if($this->usuarioService->editar($id, $request->except(['_token', 'id']))) {
            return redirect('/usuarios')->with('mensagem', 'Usuário editado com sucesso!');
        }

        return back();
    }

    public function excluir(int $id)
    {
        Usuario::findOrFail($id);

        if($this->usuarioService->excluir($id)) {
            return redirect('/usuarios')->with('mensagem', 'Usuário excluído com sucesso!');
        }

        return back();
    }
}
