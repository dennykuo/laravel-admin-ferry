<?php

declare(strict_types=1);

use Illuminate\View\View;

test('adminView helper wraps view correctly', function () {
    $view = $this->mock(View::class);
    $view->shouldReceive('render')
        ->once()
        ->andReturn('<h1>Test</h1>');

    $result = adminView($view);

    expect($result)->not->toBeNull();
});

test('admin_base_path returns correct path', function () {
    $basePath = admin_base_path();

    expect($basePath)->toBeString()
        ->and(str_contains($basePath, 'laravel-admin-ferry'))->toBeTrue();
});

test('admin_base_path sanitizes path input', function () {
    $path = admin_base_path('../../../etc/passwd');

    expect($path)->not->toContain('..')
        ->and($path)->toContain('laravel-admin-ferry');
});

test('admin_asset returns correct asset path', function () {
    $assetPath = admin_asset();

    expect($assetPath)->toBeString()
        ->and($assetPath)->toStartWith('/');
});

test('admin_asset sanitizes path input', function () {
    $path = admin_asset('../../../etc/passwd');

    expect($path)->not->toContain('..')
        ->and($path)->toStartWith('/');
});

test('admin_asset handles null path', function () {
    $path = admin_asset(null);

    expect($path)->toBeString()
        ->and($path)->toStartWith('/');
});
