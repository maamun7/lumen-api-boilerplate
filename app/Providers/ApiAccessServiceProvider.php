<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiAccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function registerBindings()
    {
       /*  $repos = [
            'Auth'
        ];

        foreach ($repos as $repo) {
            $this->app->bind("App\Repositories\\{$repo}\\{$repo}Interface", "App\Repositories\\{$repo}\\{$repo}");
        } */
    }
}
