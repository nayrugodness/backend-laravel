<?php

namespace App\Providers;

use View;
use App\CiudadReceta;
use Illuminate\Support\ServiceProvider;

class CiudadProvider extends ServiceProvider
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
        View::composer('*', function($view) {

            $ciudades = CiudadReceta::all();
            $view->with('ciudades', $ciudades);
        });
    }
}
