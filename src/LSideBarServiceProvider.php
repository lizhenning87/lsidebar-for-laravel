<?php

namespace Zning\LaravelSideBar;

use Illuminate\Support\ServiceProvider;

class LSideBarServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['lsidebar'];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $configPath = __DIR__ . '/config/lsidebar.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('lsidebar.php');
        } else {
            $publishPath = base_path('config/lsidebar.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');


        $this->registerLSideBars();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $configPath = __DIR__ . '/config/lsidebar.php';
        $this->mergeConfigFrom($configPath, 'lsidebar');

        $this->app->singleton('lsidebar', function ($app){

            $lsidebar = $this->app->make(LSideBarManager::class);

            $viewPath = __DIR__ . '/../views/';

            $this->loadViewsFrom($viewPath, 'lsidebar');

            $lsidebar->setView($app['config']['lsidebar.view']);

            return $lsidebar;

        });

    }

    public function registerLSideBars()
    {

        // Load the app lsidebar if they're in routes/lsidebar.php (Laravel 5.3)
        if (file_exists($file = $this->app['path.base'].'/routes/lsidebar.php'))
        {
            require $file;
        }

        // Load the app lsidebar if they're in app/Http/lsidebar.php (Laravel 5.0-5.2)
        elseif (file_exists($file = $this->app['path'].'/Http/lsidebar.php'))
        {
            require $file;
        }


    }
}
