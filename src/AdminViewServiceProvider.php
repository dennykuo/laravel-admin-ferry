<?php

namespace Dennykuo\AdminView;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Dennykuo\AdminView\Commands;

class AdminViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Load views
        $this->loadViewsFrom(__DIR__.'/../views', 'admin-view');

        // Blade directive
        // Blade::directive('adminViewOutline', function ($expression = null) {
        //     // $content = <<<'EOD'
        //     //     Example of string
        //     //     spanning multiple lines
        //     //     using nowdoc syntax.
        //     // EOD;
        //     // return echo $content;
        // });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/admin-view.php', 'admin-view');
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Artisan commands
        $this->commands([
            Commands\AssetsPublishCommand::class,
        ]);

        // Publish configs
        $this->publishes([
            __DIR__.'/config/admin-view.php' => config_path('admin-view.php'),
        ], 'laravel-admin-template:config');

        // Publish assets
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/laravel-admin-template'),
        ], 'laravel-admin-template:assets');
    }

}
