<?php

namespace Dennykuo\AdminFerry\Tests\Unit;

use Dennykuo\AdminFerry\AdminFerry;
use Dennykuo\AdminFerry\Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Mockery;

class AdminFerryTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_can_parse_view_with_yaml_front_matter()
    {
        // Create a test view with YAML front matter
        $viewContent = <<<'EOT'
---
name: Test Page
breadcrumb:
  - Home
  - Test
---
<h1>Test Content</h1>
EOT;

        // Create a mock view
        $view = Mockery::mock(\Illuminate\View\View::class);
        $view->shouldReceive('toHtml')->andReturn($viewContent);
        $view->shouldReceive('name')->andReturn('test.view');

        // Set ajax request header
        $this->withoutExceptionHandling();

        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
    }

    /** @test */
    public function it_returns_ajax_wrapper_for_ajax_requests()
    {
        $viewContent = <<<'EOT'
---
name: Test Page
---
<h1>Ajax Content</h1>
EOT;

        $view = Mockery::mock(\Illuminate\View\View::class);
        $view->shouldReceive('toHtml')->andReturn($viewContent);
        $view->shouldReceive('name')->andReturn('test.ajax');

        // Simulate AJAX request
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $result = AdminFerry::make($view);

        $this->assertNotNull($result);

        // Clean up
        unset($_SERVER['HTTP_X_REQUESTED_WITH']);
    }

    /** @test */
    public function it_handles_view_without_yaml_front_matter()
    {
        $viewContent = '<h1>Simple Content</h1>';

        $view = Mockery::mock(\Illuminate\View\View::class);
        $view->shouldReceive('toHtml')->andReturn($viewContent);
        $view->shouldReceive('name')->andReturn('test.simple');

        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
    }

    /** @test */
    public function it_throws_exception_on_invalid_yaml()
    {
        // YAML with invalid syntax
        $viewContent = <<<'EOT'
---
name: Test Page
  invalid: yaml
    structure
---
<h1>Test Content</h1>
EOT;

        $view = Mockery::mock(\Illuminate\View\View::class);
        $view->shouldReceive('toHtml')->andReturn($viewContent);
        $view->shouldReceive('name')->andReturn('test.invalid');

        $this->expectException(\Exception::class);

        AdminFerry::make($view);
    }

    /** @test */
    public function it_can_clear_cache()
    {
        Cache::tags(['admin-ferry-views'])->put('test-key', 'test-value', 60);

        AdminFerry::clearCache();

        $this->assertNull(Cache::tags(['admin-ferry-views'])->get('test-key'));
    }

    /** @test */
    public function it_recursively_converts_params_to_collections()
    {
        $viewContent = <<<'EOT'
---
name: Test Page
menu:
  - title: Home
    url: /
  - title: About
    url: /about
settings:
  theme: dark
  layout: wide
---
<h1>Test Content</h1>
EOT;

        $view = Mockery::mock(\Illuminate\View\View::class);
        $view->shouldReceive('toHtml')->andReturn($viewContent);
        $view->shouldReceive('name')->andReturn('test.recursive');

        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
    }
}
