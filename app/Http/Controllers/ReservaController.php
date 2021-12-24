<?php

namespace App\Http\Controllers;

use App\Data\Models\Reserva;
use App\Data\Models\Sala;
use App\Domain\Interfaces\Services\IReservaService;
use App\Http\Requests\Reserva\EditarRequest;
use App\Http\Requests\Reserva\CadastrarRequest;
use App\Http\Requests\Reservas\CriarReservaRequest;
use InvalidArgumentException;
use Symfony\Component\Console\Input\Input;

class ReservaController extends Controller
{
    private IReservaService $reservaService;

    public function __construct(IReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    public function reservar()
    {
        $salas = Sala::with(['responsavel', 'bloco'])->get();

        $salas = $salas->sort(fn ($sala1, $sala2) => $sala1->bloco->nome > $sala2->bloco->nome);

        return view('reservas.reservar', compact('salas'));
    }

    public function reservarPost(CriarReservaRequest $request)
    {
        $dados = $request->all((new Reserva)->getFillable());
        try {

            if ($this->reservaService->cadastrar($dados)) {
                return redirect('/')->with('mensagem', 'Reserva criada com sucesso!');
            }

            return back()->withInput()->withErrors([
                'comum' => 'Ocorreu um erro ao registrar reserva.',
            ]);
        } catch (InvalidArgumentException $exception) {
            return back()->withInput()->withErrors([
                'comum' => $exception->getMessage(),
            ]);
        }
    }
}
