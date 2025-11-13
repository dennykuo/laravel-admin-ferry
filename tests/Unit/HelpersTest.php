<?php

namespace Dennykuo\AdminFerry\Tests\Unit;

use Dennykuo\AdminFerry\Tests\TestCase;

class HelpersTest extends TestCase
{
    /** @test */
    public function admin_base_path_returns_correct_path(): void
    {
        $path = admin_base_path();
        $this->assertIsString($path);
        $this->assertStringContainsString('laravel-admin-ferry', $path);
    }

    /** @test */
    public function admin_base_path_can_append_relative_path(): void
    {
        $path = admin_base_path('assets/css');
        $this->assertStringEndsWith('assets/css', $path);
    }

    /** @test */
    public function admin_asset_returns_correct_url(): void
    {
        $url = admin_asset();
        $this->assertIsString($url);
        $this->assertStringStartsWith('/', $url);
        $this->assertStringContainsString('vendor/laravel-admin-ferry', $url);
    }

    /** @test */
    public function admin_asset_can_append_relative_path(): void
    {
        $url = admin_asset('css/app.css');
        $this->assertStringContainsString('css/app.css', $url);
    }

    /** @test */
    public function admin_asset_mix_throws_exception_without_path(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        admin_asset_mix();
    }
}
