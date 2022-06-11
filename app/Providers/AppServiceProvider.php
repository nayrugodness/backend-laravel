<?php

namespace App\Providers;
//import this
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){
        //add this
        Schema::defaultStringLength(191);
        $this->app->bind('path.public', function() {
            return realpath(base_path().'/../public_html');
        });
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
