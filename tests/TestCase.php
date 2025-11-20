<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Tests;

use Dennykuo\AdminFerry\AdminFerryServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            AdminFerryServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Setup default config
        $app['config']->set('admin-ferry.name', '後台測試');
        $app['config']->set('admin-ferry.home', '/');
    }
}
