<?php

namespace Dennykuo\AdminFerry\Tests;

use Dennykuo\AdminFerry\AdminFerryServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // 額外的設置
        $this->setUpConfig();
    }

    /**
     * Get package providers.
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
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        // 設置測試環境配置
        $app['config']->set('admin-ferry.name', '測試後台');
        $app['config']->set('admin-ferry.assets-path', 'vendor/laravel-admin-ferry');
    }

    /**
     * Setup configuration for tests.
     *
     * @return void
     */
    protected function setUpConfig(): void
    {
        config([
            'view.paths' => [
                __DIR__ . '/../views',
                resource_path('views'),
            ],
        ]);
    }
}
