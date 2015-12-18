<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if(is_dir(app_path('Modules'))) {
            $getAllModules = array_map('class_basename', File::directories(app_path('Modules')));
            $disableModules = config("module.disable");

            $modules = array_diff($getAllModules, $disableModules);

            foreach ($modules as $module) {

                $routes = app_path('Modules').'/'.$module.'/routes.php';
                $views  = app_path('Modules').'/'.$module.'/Views';
                $lang   = app_path('Modules').'/'.$module.'/Lang';
                $helper = app_path('Modules').'/'.$module.'/helper.php';

                if(file_exists($routes)) {
                    include $routes;
                }

                if(file_exists($helper)) {
                    include $helper;
                }

                if(is_dir($views)) {
                    $this->loadViewsFrom($views, $module);
                }

                if(is_dir($lang)) {
                    $this->loadTranslationsFrom($lang,$module);
                }
            }

        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
