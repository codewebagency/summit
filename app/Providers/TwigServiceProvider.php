<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twig_Loader_Filesystem;
use Twig_Environment;

class TwigServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register() {
        $this->app['twigLoader'] = new Twig_Loader_Filesystem(__DIR__ . '/../views');
        $this->app['twig'] ['twigLoader']= new Twig_Environment($this->app['twigLoader'], array(
            'cache' => false,
        ));
    }

    /**
     * Bootstrap files within framework
     */
    public function boot() {
        
    }

}
