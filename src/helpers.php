<?php

declare(strict_types=1);

use Dennykuo\AdminFerry\AdminFerry;
use Illuminate\View\View;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Contracts\View\Factory as ViewFactory;

if (!function_exists('adminView')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param View $view
     * @return ViewContract|ViewFactory
     */
    function adminView(View $view): ViewContract|ViewFactory
    {
        return AdminFerry::make($view);
    }
}

if (!function_exists('admin_base_path')) {
    /**
     * Get the base path of the admin ferry package.
     *
     * @param string|null $path
     * @return string
     */
    function admin_base_path(?string $path = null): string
    {
        $basePath = realpath(__DIR__ . '/../') ?: __DIR__ . '/../';

        if ($path === null) {
            return $basePath;
        }

        // Sanitize path to prevent directory traversal
        $path = str_replace(['..', '\\'], ['', '/'], $path);
        $path = ltrim($path, '/');

        return $basePath . '/' . $path;
    }
}

if (!function_exists('admin_asset')) {
    /**
     * Get the asset path for admin ferry.
     *
     * @param string|null $path
     * @return string
     */
    function admin_asset(?string $path = null): string
    {
        $assetsPath = config('admin-ferry.assets-path', 'vendor/laravel-admin-ferry');

        // Sanitize config value to prevent path traversal
        $assetsPath = str_replace(['..', '\\'], ['', '/'], $assetsPath);
        $assetsPath = '/' . trim($assetsPath, '/');

        if ($path === null) {
            return $assetsPath;
        }

        // Sanitize path input
        $path = str_replace(['..', '\\'], ['', '/'], $path);
        $path = ltrim($path, '/');

        return $assetsPath . '/' . $path;
    }
}
