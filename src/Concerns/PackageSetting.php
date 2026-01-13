<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Concerns;

trait PackageSetting
{
    /** @var string */
    protected static $viewNamespace = 'admin-ferry';

    /** @var string */
    protected static $publishConfigName = 'admin-ferry';

    /** @var string */
    protected static $assetsLinkSrcPath = 'vendor/dennykuo/laravel-admin-ferry/assets'; // 相對於 base path

    /** @var string */
    protected static $publishAssetsPath = 'vendor/laravel-admin-ferry'; // 相對於 public path

    /** @var string */
    protected static $templateSourcePath = 'vendor/dennykuo/laravel-admin-ferry/resources/stubs'; // 相對於 base path

    /** @var string */
    protected static $templateOutputPath = 'resources/views'; // 相對於 base path

    /** @var array<string, string> */
    protected static $templateList = [
        'table' => '表格 Table',
        'form' => '表單 Form',
    ];
}
