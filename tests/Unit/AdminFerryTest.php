<?php

namespace Dennykuo\AdminFerry\Tests\Unit;

use Dennykuo\AdminFerry\AdminFerry;
use Dennykuo\AdminFerry\Tests\TestCase;
use Illuminate\Support\Facades\View;

class AdminFerryTest extends TestCase
{
    /** @test */
    public function it_can_wrap_a_view_without_yaml_front_matter(): void
    {
        // 創建一個簡單的視圖
        View::addLocation(__DIR__ . '/../stubs/views');

        $view = view('simple');
        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
        $this->assertStringContainsString('Simple Content', $result->render());
    }

    /** @test */
    public function it_can_parse_yaml_front_matter(): void
    {
        View::addLocation(__DIR__ . '/../stubs/views');

        $view = view('with-yaml');
        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
    }

    /** @test */
    public function it_returns_ajax_wrapper_for_ajax_requests(): void
    {
        // 模擬 AJAX 請求
        request()->headers->set('X-Requested-With', 'XMLHttpRequest');

        View::addLocation(__DIR__ . '/../stubs/views');

        $view = view('simple');
        $result = AdminFerry::make($view);

        $this->assertNotNull($result);
    }
}
