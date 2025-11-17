<?php

namespace Dennykuo\AdminFerry;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Dennykuo\AdminFerry\Commands;
use Dennykuo\AdminFerry\Concerns\PackageSetting;
use Illuminate\Support\Facades\Artisan;

class AdminFerryServiceProvider extends ServiceProvider
{
    use PackageSetting;

    /**
     * Bootstrap package services
     *
     * @return void
     */
    public function boot(): void
    {
        // If run in console
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Load views with new namespace
        $this->loadViewsFrom(__DIR__.'/../views', self::$viewNamespace);

        // Add view components namespace
        Blade::componentNamespace(__NAMESPACE__.'\\View\\Components', self::$viewNamespace);

        // 擴展 Collection - 使用更清晰的實現
        $this->registerCollectionMacros();

        // 檢查套件的 mix-manifest.json 是否存在（僅在非生產環境）
        if (!$this->app->isProduction()) {
            $this->checkMixManifestFile();
        }
    }

    /**
     * Register package services
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/admin-ferry.php', static::$publishConfigName);

        // Set assets publish config
        Config::set(static::$publishConfigName . '.assets-path', static::$publishAssetsPath);
    }

    /**
     * Console booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Artisan commands
        $this->commands([
            Commands\AssetsPublishCommand::class,
        ]);

        // Publish configs
        $output = config_path(static::$publishConfigName . '.php');
        $this->publishes([
            __DIR__.'/config/admin-ferry.php' => $output,
        ], 'laravel-admin-ferry:config');
    }

    /**
     * 註冊 Collection 宏
     *
     * @return void
     */
    protected function registerCollectionMacros(): void
    {
        // 擴展 Collection - 遞迴轉換陣列和物件為 Collection
        Collection::macro('recursive', function () {
            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();
                }

                return $value;
            });
        });
    }

    /**
     * 檢查 mix-manifest.json 文件是否存在，使用緩存避免重複檢查
     *
     * @return void
     */
    protected function checkMixManifestFile(): void
    {
        $cacheKey = 'admin-ferry:manifest-checked';

        // 使用緩存避免每次請求都檢查文件系統
        $manifestExists = Cache::remember($cacheKey, 3600, function () {
            $manifestFile = public_path(admin_asset() . 'mix-manifest.json');
            return file_exists($manifestFile);
        });

        if (!$manifestExists) {
            $this->commands([
                Commands\AssetsPublishCommand::class,
            ]);

            Artisan::call('laravel-admin-ferry:assets-publish');

            // 清除緩存以便下次重新檢查
            Cache::forget($cacheKey);
        }
    }
}
