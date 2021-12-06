<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if(!$request->session()->get('autenticado'))
            return response()->redirectTo(route('login'));

        return $next($request);
    }
}
