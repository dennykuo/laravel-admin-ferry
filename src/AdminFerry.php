<?php

namespace Dennykuo\AdminFerry;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\View\View;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Collection;

class AdminFerry
{
    /**
     * 處理內容 view，分析頁面的 YAML 變數及內容。視請求是否為 ajax 做不同頁面外圍包裹後回應
     *
     * @param View $view
     * @return ViewContract|ViewFactory
     * @throws \Throwable
     */
    public static function make(View $view): ViewContract|ViewFactory
    {
        try {
            $viewHTML = $view->render();
            $viewParsed = self::parseView($viewHTML);
            $viewParams = collect($viewParsed->params)->recursive(); // AdminFerryServiceProvider 中有設定 Collection 擴展
            $viewContent = $viewParsed->content;
            $viewWrapper = request()->ajax() ? 'admin-ferry::carrier-ajax' : 'admin-ferry::carrier';

            return view($viewWrapper, compact('viewContent', 'viewParams'));
        } catch (\Throwable $e) {
            // 記錄錯誤並重新拋出，讓 Laravel 的錯誤處理機制處理
            logger()->error('AdminFerry view rendering failed', [
                'view' => $view->name(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
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
            logger()->error('YAML front matter parsing failed', [
                'error' => $e->getMessage(),
            ]);

            // 如果 YAML 解析失敗，返回原始 HTML 作為內容
            return (object) [
                'content' => $viewHTML,
                'params' => [],
            ];
        }
    }
}
