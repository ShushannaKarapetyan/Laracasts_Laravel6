<?php

namespace App\Providers;

use App\Collaborator;
use App\Example;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*app()->bind('App\Example', function (){*/
        //we can use '$this->app' instead 'app()', because the ServiceProvider has 'protected $app';
        //if we use singleton() instead of bind() in AppServiceProvider->register() , we get same objects
        /*$this->app->singleton('App\Example', function (){*/
        $this->app->bind('App\Example', function (){
            $collaborator = new Collaborator();
            $foo = "Something";
            return new Example($collaborator,$foo);
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
