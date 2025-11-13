<?php

use Dennykuo\AdminFerry\AdminFerry;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\View\View;

if (! function_exists('adminView')) {
    /**
     * 取得經過 Admin Ferry 處理的視圖內容
     *
     * 將視圖包裹在 admin-ferry 的 carrier 佈局中，並解析 YAML front matter
     *
     * @param View $view Laravel 視圖實例
     * @return ViewContract|ViewFactory 處理後的視圖
     * @throws \Throwable
     */
    function adminView(View $view): ViewContract|ViewFactory
    {
        return AdminFerry::make($view);
    }
}

if (! function_exists('admin_base_path')) {
    /**
     * 取得 admin-ferry 套件的基礎路徑
     *
     * @param string|null $path 相對路徑
     * @return string 完整路徑
     */
    function admin_base_path(?string $path = null): string
    {
        $basePath = __DIR__.'/../';

        if ($path === null) {
            return $basePath;
        }

        // 移除開頭的斜線並組合路徑
        return $basePath . ltrim($path, '/');
    }
}

if (! function_exists('admin_asset')) {
    /**
     * 取得 admin-ferry 資源的 URL 路徑
     *
     * @param string|null $path 資源相對路徑
     * @return string 資源 URL
     */
    function admin_asset(?string $path = null): string
    {
        $assetsPath = config('admin-ferry.assets-path', 'vendor/laravel-admin-ferry');

        if ($path === null) {
            return '/' . $assetsPath . '/';
        }

        return '/' . $assetsPath . '/' . ltrim($path, '/');
    }
}

if (! function_exists('admin_asset_mix')) {
    /**
     * 取得經過 Laravel Mix 版本控制的資源路徑
     *
     * @param string|null $path 資源相對路徑
     * @return string 帶版本號的資源 URL
     * @throws \Exception
     */
    function admin_asset_mix(?string $path = null): string
    {
        if ($path === null) {
            throw new \InvalidArgumentException('admin_asset_mix() 需要提供資源路徑參數');
        }

        $manifestDirectory = trim(admin_asset(), '/');
        $path = ltrim($path, '/');

        return mix($path, $manifestDirectory);
    }
}
