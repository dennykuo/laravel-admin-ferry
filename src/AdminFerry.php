<?php

namespace Dennykuo\AdminFerry;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class AdminFerry
{
    /**
     * 處理內容 view，分析頁面的 YAML 變數及內容。視請求是否為 ajax 做不同頁面外圍包裹後回應
     *
     * @param View $view
     * @return ViewContract|Factory
     * @throws \Exception
     */
    public static function make(View $view): ViewContract|Factory
    {
        try {
            $viewHTML = $view->toHtml();
            $viewParsed = self::parseView($viewHTML);
            $viewParams = collect($viewParsed->params)->recursive(); // AdminFerryServiceProvider 中有設定 Collection 擴展
            $viewContent = $viewParsed->content;
            $viewWrapper = request()->ajax() ? 'admin-ferry::carrier-ajax' : 'admin-ferry::carrier';

            return view($viewWrapper, compact('viewContent', 'viewParams'));
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
     * 解析 view HTML，提取 YAML front matter 和內容
     *
     * @param string $viewHTML
     * @return object{content: string, params: array}
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
     * 清除解析緩存（如果將來實現緩存功能）
     *
     * @return void
     */
    public static function clearCache(): void
    {
        Cache::tags(['admin-ferry-views'])->flush();
    }
}
