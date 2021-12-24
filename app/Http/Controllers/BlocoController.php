<?php

namespace App\Http\Controllers;

use App\Data\Models\Bloco;
use App\Domain\Interfaces\Services\IBlocoService;
use App\Http\Requests\Blocos\CadastrarRequest;
use App\Http\Requests\Blocos\EditarRequest;

class BlocoController extends Controller
{
    private IBlocoService $blocoService;

    public function __construct(IBlocoService $blocoService)
    {
        $this->blocoService = $blocoService;
    }

    public function index()
    {
        $blocos = Bloco::query()->paginate(15);
        return view('blocos.index', compact('blocos'));
    }

    public function cadastrarBloco()
    {
        return view('blocos.cadastrar');
    }

    public function cadastrarBlocoPost(CadastrarRequest $request)
    {
        $bloco = $this->blocoService->cadastrar($request->all());

        if($bloco != null) {
            return redirect('/blocos')->with('mensagem', 'Bloco cadastrado com sucesso!');
        }

        return back();
    }

    public function editarBloco(int $id)
    {
        $bloco = Bloco::findOrFail($id);
        return view('blocos.editar', compact('bloco'));
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
