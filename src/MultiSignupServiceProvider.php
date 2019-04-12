<?php

namespace DevWorkout\MultiSignup;

use Illuminate\Support\ServiceProvider;

class MultiSignupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ( $this->app->runningInConsole() )
        {
            $this->publishes( [
                __DIR__ . '/../config/config.php' => config_path( 'multisignup.php' ),
            ], 'config' );

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind( 'multisignup', MultiSignupClass::class );
        $this->mergeConfigFrom( __DIR__ . '/../config/config.php', 'multisignup' );
    }
}
