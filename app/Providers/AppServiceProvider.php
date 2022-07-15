<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        Blade::if('admin', function(){
            return auth()->user()->rol === 1;
        });
        Blade::if('secre', function(){
            return auth()->user()->rol === 2;
        });
        Blade::if('beca', function(){
            return auth()->user()->rol === 3;
        });
        Blade::if('user', function(){
            return auth()->user()->rol === 4;
        });
    }
}
