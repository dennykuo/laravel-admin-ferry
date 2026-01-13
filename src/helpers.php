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
            return $assetsPath . '/';
        }

        // Sanitize path input
        $path = str_replace(['..', '\\'], ['', '/'], $path);
        $path = ltrim($path, '/');

        return $assetsPath . '/' . $path;
    }
}

if (!function_exists('admin_asset_mix')) {
    /**
     * Get the versioned asset path from manifest.json for admin ferry.
     *
     * @param string|null $path
     * @return string
     */
    function admin_asset_mix(?string $path = null): string
    {
        if ($path === null) {
            return admin_asset();
        }

        $assetsPath = config('admin-ferry.assets-path', 'vendor/laravel-admin-ferry');
        $manifestPath = public_path($assetsPath . '/manifest.json');

        // If manifest doesn't exist, fall back to regular admin_asset
        if (!file_exists($manifestPath)) {
            return admin_asset($path);
        }

        try {
            $manifestContent = file_get_contents($manifestPath);
            if ($manifestContent === false) {
                return admin_asset($path);
            }

            $manifest = json_decode($manifestContent, true);

            if (!is_array($manifest)) {
                return admin_asset($path);
            }

            // Try to find the path in manifest
            $sanitizedPath = str_replace(['..', '\\'], ['', '/'], $path);
            $sanitizedPath = ltrim($sanitizedPath, '/');

            // Check if path exists in manifest
            if (isset($manifest[$sanitizedPath]['file'])) {
                return admin_asset($manifest[$sanitizedPath]['file']);
            }

            // Try with resources/ prefix
            $resourcePath = 'resources/' . $sanitizedPath;
            if (isset($manifest[$resourcePath]['file'])) {
                return admin_asset($manifest[$resourcePath]['file']);
            }

            // Fall back to regular path
            return admin_asset($path);
        } catch (\Exception $e) {
            // On any error, fall back to regular admin_asset
            return admin_asset($path);
        }
    }
}
