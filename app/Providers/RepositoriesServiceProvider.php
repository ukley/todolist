<?php

namespace App\Providers;

use App\Repositories\TarefaRepository;
use App\Repositories\TarefaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TarefaRepositoryInterface::class,TarefaRepository::class);
    }
}
