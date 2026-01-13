<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * AdminFerry 核心類別
 *
 * 處理內容 view，分析頁面的 YAML 前置內容及 HTML 內容。
 * 根據請求是否為 AJAX 來決定使用不同的頁面包裹方式。
 */
class AdminFerry
{
    /**
     * 處理並包裝視圖內容
     *
     * @param View $view Laravel 視圖實例
     * @return ViewContract|ViewFactory 包裝後的視圖
     * @throws \Exception
     */
    public static function make(View $view): ViewContract|ViewFactory
    {
        try {
            $viewHTML = $view->render();
            $viewParsed = self::parseView($viewHTML);

            /** @var Collection $viewParams */
            // @phpstan-ignore-next-line - recursive() is a macro registered in ServiceProvider
            $viewParams = collect($viewParsed->params)->recursive();
            $viewContent = $viewParsed->content;

            // 根據請求類型選擇不同的包裝模板
            $viewWrapper = request()->ajax() ? 'admin-ferry::carrier-ajax' : 'admin-ferry::carrier';

            return view()->make($viewWrapper, compact('viewContent', 'viewParams'));
        } catch (\Exception $e) {
            // Log the error and re-throw for better debugging
            logger()->error('AdminFerry view parsing failed', [
                'view' => $view->name(),
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    /**
     * 解析視圖 HTML，提取 YAML 前置內容和 HTML 內容
     *
     * @param string $viewHTML 視圖的 HTML 字串
     * @return object{content: string, params: array<string, mixed>} 解析後的內容物件
     * @throws \Exception
     */
    protected static function parseView(string $viewHTML): object
    {
        try {
            $viewParsed = YamlFrontMatter::parse($viewHTML);

            return (object) [
                'content' => $viewParsed->body(),
                'params' => $viewParsed->matter(),
            ];
        } catch (\Exception $e) {
            throw new \Exception("Failed to parse YAML front matter: {$e->getMessage()}", 0, $e);
        }
    }

    /**
     * 清除解析緩存
     *
     * @return void
     */
    public static function clearCache(): void
    {
        Cache::tags(['admin-ferry-views'])->flush();
    }
}
