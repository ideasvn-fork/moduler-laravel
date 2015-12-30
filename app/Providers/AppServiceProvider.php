<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{

    protected $backend;

    protected $frontend;

    public function boot()
    {
        $this->backend = "themeone";
        $this->frontend = "themetwo";

        View::addNamespace('backend',public_path('Themes/backend/'.$this->backend.'/views'));
        View::addNamespace('frontend',public_path('Themes/frontend/'.$this->frontend.'/views'));
    }


    public function register()
    {
        //
    }
}
