<?php

declare(strict_types=1);

use Illuminate\Support\Collection;

test('service provider is loaded', function () {
    expect(app()->getProvider('Dennykuo\AdminFerry\AdminFerryServiceProvider'))
        ->not->toBeNull();
});

test('config is loaded correctly', function () {
    $config = config('admin-ferry.name');

    expect($config)->toBe('後台測試');
});

test('views are registered', function () {
    expect(view()->exists('admin-ferry::carrier'))->toBeTrue();
});

test('collection recursive macro is registered', function () {
    $collection = collect([
        'level1' => [
            'level2' => [
                'level3' => 'value',
            ],
        ],
    ]);

    $recursive = $collection->recursive();

    expect($recursive)->toBeInstanceOf(Collection::class)
        ->and($recursive->get('level1'))->toBeInstanceOf(Collection::class);
});
