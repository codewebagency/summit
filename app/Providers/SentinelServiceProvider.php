<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


/**
 * Description of SentinelServiceProvider
 *
 * @author hossein
 */
class SentinelServiceProvider extends ServiceProvider {
    
    public function register() {
        $this->app->sentinel = (new \Cartalyst\Sentinel\Native\Facades\Sentinel())->getSentinel(); 
    }
    /**
     * 
     */
    public function boot()
    {
        
    }
}
