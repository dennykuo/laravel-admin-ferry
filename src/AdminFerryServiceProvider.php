<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry;

use Dennykuo\AdminFerry\Commands\AssetsPublishCommand;
use Dennykuo\AdminFerry\Commands\MakeTemplateCommand;
use Dennykuo\AdminFerry\Concerns\PackageSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

/**
 * AdminFerry 服務提供者
 *
 * 負責註冊套件的視圖、命令、配置和 Collection 擴展。
 */
class AdminFerryServiceProvider extends ServiceProvider
{
    use PackageSetting;

    /**
     * 取得服務提供者提供的服務
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            'Spatie\Html\HtmlServiceProvider',
        ];
    }

    /**
     * 啟動套件服務
     *
     * @return void
     */
    public function boot(): void
    {
        // 如果在命令列環境中運行
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // 載入視圖並設定命名空間
        $this->loadViewsFrom(__DIR__ . '/../resources/views', self::$viewNamespace);

        // 註冊 Blade 組件命名空間
        Blade::componentNamespace(__NAMESPACE__ . '\\View\\Components', self::$viewNamespace);

        // 擴展 Collection 支援遞迴轉換
        $this->registerCollectionMacros();

        // 檢查套件的 manifest.json 是否存在（僅在非生產環境）
        if (!$this->app->isProduction()) {
            $this->ensureManifestFileExists();
        }
    }

    /**
     * 註冊套件服務
     *
     * @return void
     */
    public function register(): void
    {
        // 合併配置檔案
        $this->mergeConfigFrom(__DIR__ . '/config/admin-ferry.php', static::$publishConfigName);

        // 設定 assets 發布路徑配置
        Config::set(static::$publishConfigName . '.assets-path', static::$publishAssetsPath);
    }

    /**
     * 命令列環境啟動設定
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // 註冊 Artisan 命令
        $this->commands([
            AssetsPublishCommand::class,
            MakeTemplateCommand::class,
        ]);

        // 發布配置檔案
        $this->publishes([
            __DIR__ . '/config/admin-ferry.php' => config_path(static::$publishConfigName . '.php'),
        ], 'laravel-admin-ferry-config');
    }

    /**
     * 註冊 Collection 巨集方法
     *
     * @return void
     */
    protected function registerCollectionMacros(): void
    {
        // 擴展 Collection 支援遞迴轉換陣列和物件
        Collection::macro('recursive', function (): Collection {
            /** @var Collection $this */
            return $this->map(function (mixed $value): mixed {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();
                }

                return $value;
            });
        });
    }

    /**
     * 檢查並確保 manifest.json 檔案存在
     *
     * @return void
     */
    protected function ensureManifestFileExists(): void
    {
        $cacheKey = 'admin-ferry:manifest-checked';

        // 使用緩存避免每次請求都檢查文件系統
        $manifestExists = Cache::remember($cacheKey, 3600, function () {
            $manifestFile = public_path(admin_asset() . '/manifest.json');
            return File::exists($manifestFile);
        });

        if (!$manifestExists) {
            $this->commands([
                AssetsPublishCommand::class,
            ]);

            Artisan::call('laravel-admin-ferry:assets-publish');

            // 清除緩存以便下次重新檢查
            Cache::forget($cacheKey);
        }
    }
}
