<?php

namespace App\Http\Controllers;

use App\Data\Models\Sala;
use App\Domain\Interfaces\Services\ISalaService;
use App\Http\Requests\Sala\CadastrarRequest;
use App\Http\Requests\Sala\EditarRequest;

class SalaController extends Controller
{
    private ISalaService $salaService;

    public function __construct(ISalaService $salaService)
    {
        $this->salaService = $salaService;
    }

    public function index()
    {
        $sala = Sala::query()->paginate(15);

        return view('sala.index', compact('sala'));
    }

    public function cadastrarSala()
    {
        return view('sala.cadastrar');
    }

    public function cadastrarSalaPost(CadastrarRequest $request)
    {
        $sala = $this->salaService->cadastrar($request->all());

        if($sala != null) {
            return redirect('/sala')->with('mensagem', 'Sala cadastrada com sucesso!');
        }

        return back();
    }

    public function editarSala(int $id)
    {
        $sala = Sala::findOrFail($id);
        return view('sala.editar', compact('sala'));
    }

    public function editarSalaPost(int $id, EditarRequest $request)
    {
        Sala::findOrFail($id);

        if($this->salaService->editar($id, $request->except(['_token', 'id']))) {
            return redirect('/sala')->with('mensagem', 'Sala editada com sucesso!');
        }

        return back();
    }

    public function excluir(int $id)
    {
        Sala::findOrFail($id);

        if($this->salaService->excluir($id)) {
            return redirect('/sala')->with('mensagem', 'Sala excluída com sucesso!');
        }

        return back();
    }
}
