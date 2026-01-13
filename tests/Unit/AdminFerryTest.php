<?php

declare(strict_types=1);

use Dennykuo\AdminFerry\AdminFerry;
use Illuminate\View\View;

test('AdminFerry can parse view with YAML front matter', function () {
    $view = $this->mock(View::class);
    $view->shouldReceive('render')
        ->once()
        ->andReturn("---\ntitle: Test Page\nbreadcrumb:\n  - Home\n  - Test\n---\n<h1>Test Content</h1>");

    $result = AdminFerry::make($view);

    expect($result)->not->toBeNull();
});

test('AdminFerry can handle view without YAML front matter', function () {
    $view = $this->mock(View::class);
    $view->shouldReceive('render')
        ->once()
        ->andReturn('<h1>Simple Content</h1>');

    $result = AdminFerry::make($view);

    expect($result)->not->toBeNull();
});
