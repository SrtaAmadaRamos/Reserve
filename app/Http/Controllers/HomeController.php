<?php

namespace App\Http\Controllers;

use App\Data\Models\Reserva;
use App\Domain\Interfaces\Services\IReservaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private IReservaService $reservaService;

    public function __construct(IReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    public function index()
    {
        $reservas = $this->reservaService->obterReservasParaHome();

        return view('home.index', compact('reservas'));
    }
}
