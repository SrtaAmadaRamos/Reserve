<?php

namespace App\Http\Controllers;

use App\Data\Models\Reserva;
use App\Domain\Interfaces\Services\IReservaService;
use App\Http\Requests\Reserva\EditarRequest;
use App\Http\Requests\Reserva\CadastrarRequest;

class ReservaController extends Controller
{
    private IReservaService $reservaService;

    public function __construct(IReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    public function index()
    {
        $reserva = Reserva::query()->paginate(15);
        return view('reserva.index', compact('reserva'));
    }

    public function cadastrarReserva()
    {
        return view('reserva.cadastrar');
    }

    public function cadastrarReservaPost(CadastrarRequest $request)
    {
        $reserva = $this->reservaService->cadastrar($request->all());

        if($reserva != null) {
            return redirect('/reserva')->with('mensagem', 'reserva cadastrado com sucesso!');
        }

        return back();
    }

    public function editarReserva(int $id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('reserva.editar', compact('reserva'));
    }

    public function editarReservaPost(int $id, EditarRequest $request)
    {
        Reserva::findOrFail($id);

        if($this->reservaService->editar($id, $request->except(['_token', 'id']))) {
            return redirect('/reserva')->with('mensagem', 'Reserva editada com sucesso!');
        }

        return back();
    }

    public function excluir(int $id)
    {
        Reserva::findOrFail($id);

        if($this->reservaService->excluir($id)) {
            return redirect('/reserva')->with('mensagem', 'Reserva excluída com sucesso!');
        }

        return back();
    }
}
