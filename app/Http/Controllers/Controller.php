<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function autenticado(): bool
    {
        return request()->session()->get('autenticado', false);
    }

    protected function nomeUsuarioAutenticado(): string
    {
        if($this->autenticado())
            return request()->session()->get('nome', '');
        return '';
    }
}
