<?php

namespace Mantey\Laratrait;

use Illuminate\Support\ServiceProvider;
use Mantey\Laratrait\Console\Commands\TraitMakeCommand;

class LaratraitServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLaratrait();

        $this->registerCommands();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerLaratrait() {

        $this->app->bind('laratrait', function ($app) {
            return new Laratrait($app);
        });

    }

    /**
     * Register the application commands.
     *
     * @return void
     */
    protected function registerCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TraitMakeCommand::class,
            ]);
        }
    }

}
