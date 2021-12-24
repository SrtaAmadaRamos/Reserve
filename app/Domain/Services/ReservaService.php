<?php

namespace App\Domain\Services;

use App\Data\Models\Reserva;
use App\Domain\Interfaces\Services\IReservaService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class ReservaService implements IReservaService
{

    private Reserva $model;

    public function __construct(Reserva $model)
    {
        $this->model = $model;
    }

    public function obterReservasParaHome(int $limit = 15): Collection
    {
        $now = Carbon::now();
        return Reserva::query()
                        ->with([
                            'sala' => fn($query) => $query->with(['bloco', 'responsavel']),
                            'solicitante'
                        ])
                        ->whereDate('data', '>=', $now)
                        ->where(function ($query) use ($now) {
                            $query
                                ->whereTime('horarioEntrada','>=', $now->toTimeString())
                                ->orWhereTime('horarioSaida', '>=', $now->toTimeString());
                        })
                        ->orderBy('data')->orderBy('horarioEntrada')
                        ->limit($limit)
                        ->get();
    }

    public function cadastrar(array $dados): ?Reserva
    {
        $entrada = strtotime($dados['horarioEntrada']);
        $saida = strtotime($dados['horarioSaida']);

        if($entrada >= $saida) {
            throw new InvalidArgumentException("O horário de entrada não pode ser após o horário de saida!");
        }

        if(!$this->verificarDisponibilidadeDoDia($dados['sala_id'], $dados['data'], $dados['horarioEntrada'], $dados['horarioSaida'])) {
            throw new InvalidArgumentException("Dia e horário para esta sala indisponíveis.");
        }

        $dados['usuario_id'] = request()->session()->get('id');

        return $this->model->create($dados);
    }

    private function verificarDisponibilidadeDoDia(int $sala_id, $data, $entrada, $saida): bool
    {
        return !$this->model->query()
                            ->where('sala_id', $sala_id)
                            ->whereDate('data', '=', $data)
                            ->where(function($query) use ($entrada, $saida) {
                                $query
                                    ->where(function ($query) use ($entrada) {
                                        $query
                                            ->whereTime('horarioEntrada', '<=', $entrada)
                                            ->whereTime('horarioSaida', '>=', $entrada);
                                    })
                                    ->orWhere(function ($query) use ($saida) {
                                        $query
                                            ->orWhereTime('horarioEntrada', '<=', $saida)
                                            ->whereTime('horarioSaida', '>=', $saida);
                                    });
                            })
                            ->exists();
    }
}
