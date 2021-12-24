<?php

namespace App\Providers;

use App\Domain\Interfaces\Services\IBlocoService;
use App\Domain\Interfaces\Services\IReservaService;
use App\Domain\Interfaces\Services\ISalaService;
use App\Domain\Interfaces\Services\IUsuarioService;
use App\Domain\Services\BlocoService;
use App\Domain\Services\ReservaService;
use App\Domain\Services\SalaService;
use App\Domain\Services\UsuarioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUsuarioService::class, UsuarioService::class);
        $this->app->bind(IBlocoService::class, BlocoService::class);
        $this->app->bind(ISalaService::class, SalaService::class);
        $this->app->bind(IReservaService::class, ReservaService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
