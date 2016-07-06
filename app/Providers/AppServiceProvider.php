<?php

namespace App\Providers;

use App\Lib\Binary\Academy\Smartphone\Smartphone;
use App\Lib\Binary\Academy\Smartphone\Camera;
use App\Lib\Binary\Academy\Smartphone\Cpu;
use App\Lib\Binary\Academy\Smartphone\Display;
use App\Lib\Binary\Academy\Smartphone\Battery;

use App\Lib\Binary\Academy\Computer\Computer;
use App\Lib\Binary\Academy\Computer\Hardware;
use App\Lib\Binary\Academy\Computer\Periphery;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // General binding. Resolved every time
        $this->app->bind('Computer', function($app) {
            return new Computer(new Hardware(), new Periphery());
        });

        $this->app->bind('Smartphone', function($app) {
            return new Smartphone(new Camera(), new Cpu(), new Display(), new Battery());
        });

        // Singleton binding. Resolved once
        $this->app->singleton('Computer', function($app) {
            return new Computer(new Hardware(), new Periphery());
        });

        // Instance binding
        $computer = new Computer(new Hardware(), new Periphery());
        $this->app->instance('Computer', $computer);

        // Interface to implementation binding
        $this->app->bind(
            'App\Lib\Binary\Academy\UserRepository',
            'App\Lib\Binary\Academy\Repositories\ArrayUserRepository'
        );

        // Automatic resolving
        $this->app->bind('Computer', Computer::class); // or full path
    }
}
