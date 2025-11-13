<?php

namespace Dennykuo\AdminFerry;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Collection;
use Dennykuo\AdminFerry\Commands;
use Dennykuo\AdminFerry\Concerns\PackageSetting;
use Illuminate\Support\Facades\Artisan;

class AdminFerryServiceProvider extends ServiceProvider
{
    use PackageSetting;

    /**
     * Bootstrap any application services.
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

        // 擴展 Collection - 添加 recursive 方法
        $this->registerCollectionMacros();

        // 檢查套件的 mix-manifest.json 是否存在，不存在則 publish
        // 只在開發環境或第一次安裝時檢查，避免每次請求都執行
        if ($this->app->environment('local') || config('app.debug')) {
            $this->checkMixManifestFile();
        }
    }

    /**
     * Register any application services.
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
     * 註冊 Collection 巨集
     *
     * @return void
     */
    protected function registerCollectionMacros(): void
    {
        // 如果 macro 已經註冊則跳過（避免重複註冊）
        if (Collection::hasMacro('recursive')) {
            return;
        }

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
     * 檢查 mix-manifest.json 是否存在，不存在則自動發布
     *
     * @return void
     */
    protected function checkMixManifestFile(): void
    {
        try {
            $manifestFile = public_path(admin_asset() . 'mix-manifest.json');

            if (! file_exists($manifestFile)) {
                // 只在 console 環境下自動執行
                if ($this->app->runningInConsole()) {
                    $this->commands([
                        Commands\AssetsPublishCommand::class,
                    ]);

                    Artisan::call('laravel-admin-ferry:assets-publish');
                }
            }
        } catch (\Exception $e) {
            // 靜默失敗，避免影響應用程式啟動
            logger()->warning('Failed to check mix-manifest.json', [
                'error' => $e->getMessage(),
            ]);
        }
    }
}
