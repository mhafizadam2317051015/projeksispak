<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Python\PythonExecutor;
use App\Services\ExpertSystem\ForwardChainingService;





class AppServiceProvider extends ServiceProvider
{

    public function register()
{
    $this->app->singleton(PythonExecutor::class, function () {
        return new PythonExecutor();
    });

    $this->app->singleton(ForwardChainingService::class, function ($app) {
        return new ForwardChainingService($app->make(PythonExecutor::class));
    });
}


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
