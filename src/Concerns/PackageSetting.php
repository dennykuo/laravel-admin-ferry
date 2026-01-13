<?php

namespace Dennykuo\AdminFerry\Concerns;

trait PackageSetting
{
    private static $viewNamespace = 'admin-ferry';
    private static $publishConfigName = 'admin-ferry';

    private static $assetsLinkSrcPath = 'vendor/dennykuo/laravel-admin-ferry/assets'; // 相對於 base path
    private static $publishAssetsPath = 'vendor/laravel-admin-ferry'; // 相對於 public path

    private static $templateSourcePath = 'vendor/dennykuo/laravel-admin-ferry/resources/stubs'; // 相對於 base path
    private static $templateOutputPath = 'resources/views'; // 相對於 base path

    private static $templateList = [
        'table' => '表格 Table',
        'form' => '表單 Form',
    ];
}
