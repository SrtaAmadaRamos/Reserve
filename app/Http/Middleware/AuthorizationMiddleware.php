<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class AuthorizationMiddleware
{
    private array $tipos = [
        'admin' => 1,
        'usuario' => 2
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$tipos
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$tipos): mixed
    {
        if ($tipos == null || empty($tipos))
            $tipos = ['admin'];

        $tipo = $request->session()->get('tipo');

        if(!in_array($tipo, $this->getTiposSelecionados($tipos)))
            abort(403, 'Você não tem autorização para acessar essa página.');

        return $next($request);
    }

    private function getTiposSelecionados(array $tipos): array
    {
        return array_filter($this->tipos, function ($tipo) use ($tipos) {
            return in_array($tipo, $tipos);
        }, ARRAY_FILTER_USE_KEY);
    }
}
