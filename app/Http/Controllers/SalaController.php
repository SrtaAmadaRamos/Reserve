<?php

namespace App\Http\Controllers;

use App\Data\Models\Bloco;
use App\Data\Models\Sala;
use App\Data\Models\Usuario;
use App\Domain\Interfaces\Services\ISalaService;
use App\Http\Requests\Salas\CadastrarRequest;
use App\Http\Requests\Salas\EditarRequest;

class SalaController extends Controller
{
    private ISalaService $salaService;

    public function __construct(ISalaService $salaService)
    {
        $this->salaService = $salaService;
    }

    public function index()
    {
        $salas = Sala::query()
                        ->with(['bloco', 'responsavel'])
                        ->paginate(15);

        return view('salas.index', compact('salas'));
    }

    public function cadastrarSala()
    {
        $blocos = Bloco::all();
        $responsaveis = Usuario::all();
        return view('salas.cadastrar', compact('blocos', 'responsaveis'));
    }

    public function cadastrarSalaPost(CadastrarRequest $request)
    {
        $sala = $this->salaService->cadastrar($request->all());

        if($sala != null) {
            return redirect('/salas')->with('mensagem', 'Sala cadastrada com sucesso!');
        }

        return back();
    }

    public function editarSala(int $id)
    {
        $sala = Sala::findOrFail($id);
        $blocos = Bloco::all();
        $responsaveis = Usuario::all();

        return view('salas.editar', compact('sala', 'blocos', 'responsaveis'));
    }

    public function editarSalaPost(int $id, EditarRequest $request)
    {
        Sala::findOrFail($id);

        if($this->salaService->editar($id, $request->except(['_token', 'id']))) {
            return redirect('/salas')->with('mensagem', 'Sala editada com sucesso!');
        }

        return back();
    }

    public function excluir(int $id)
    {
        Sala::findOrFail($id);

        if($this->salaService->excluir($id)) {
            return redirect('/salas')->with('mensagem', 'Sala excluída com sucesso!');
        }

        return back();
    }
}
