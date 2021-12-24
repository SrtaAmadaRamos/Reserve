<?php

namespace App\Http\Controllers;

use App\Data\Models\Bloco;
use App\Domain\Interfaces\Services\IBlocoService;

class BlocoController extends Controller
{
    private IBlocoService $blocoService;

    public function __construct(IBlocoService $blocoService)
    {
        $this->blocoService = $blocoService;
    }

    public function index()
    {
        $usuarios = Bloco::query()->paginate(15);
        return view('usuarios.index', compact('blocos'));
    }

    public function cadastrarBloco()
    {
        return view('blocos.cadastrar');
    }

    public function cadastrarBlocoPost(CadastrarRequest $request)
    {
        $usuario = $this->blocoService->cadastrar($request->all());

        if($usuario != null) {
            return redirect('/blocos')->with('mensagem', 'Bloco cadastrado com sucesso!');
        }

        return back();
    }

    public function editarBloco(int $id)
    {
        $usuario = Bloco::findOrFail($id);
        return view('blocos.editar', compact('usuario'));
    }

    public function editarBlocoPost(int $id, EditarRequest $request)
    {
        Bloco::findOrFail($id);

        if($this->blocoService->editar($id, $request->except(['_token', 'id']))) {
            return redirect('/blocos')->with('mensagem', 'Bloco editado com sucesso!');
        }

        return back();
    }

    public function excluir(int $id)
    {
        Bloco::findOrFail($id);

        if($this->blocoService->excluir($id)) {
            return redirect('/blocos')->with('mensagem', 'Bloco excluído com sucesso!');
        }

        return back();
    }

}
