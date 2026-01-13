<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Tests;

use Dennykuo\AdminFerry\AdminFerryServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpConfig();
    }

    /**
     * Get package providers
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            AdminFerryServiceProvider::class,
        ];
    }

    /**
     * Define environment setup
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        // Setup default config
        $app['config']->set('admin-ferry.name', '後台測試');
        $app['config']->set('admin-ferry.home', '/');
        $app['config']->set('admin-ferry.assets-path', 'vendor/admin-ferry/assets');
        $app['config']->set('cache.default', 'array');
    }

    /**
     * Setup package config
     *
     * @return void
     */
    protected function setUpConfig(): void
    {
        config(['admin-ferry.assets-path' => 'vendor/admin-ferry/assets']);
    }
}
