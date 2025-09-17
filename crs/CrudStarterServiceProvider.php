<?php

namespace CrudStarter;

use Illuminate\Support\ServiceProvider;
use CrudStarter\Console\ProductCrudCommand;

class CrudStarterServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProductCrudCommand::class,
            ]);
        }
    }
}
