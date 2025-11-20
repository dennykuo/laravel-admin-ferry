<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Spatie\YamlFrontMatter\Document;

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
     */
    public static function make(View $view): ViewContract|ViewFactory
    {
        $viewHTML = $view->render();
        $viewParsed = self::parseView($viewHTML);

        /** @var Collection $viewParams */
        $viewParams = collect($viewParsed->params)->recursive();
        $viewContent = $viewParsed->content;

        return view()->make('admin-ferry::carrier', compact('viewContent', 'viewParams'));
    }

    /**
     * 解析視圖 HTML，提取 YAML 前置內容和 HTML 內容
     *
     * @param string $viewHTML 視圖的 HTML 字串
     * @return object{content: string, params: array<string, mixed>} 解析後的內容物件
     */
    protected static function parseView(string $viewHTML): object
    {
        $viewParsed = YamlFrontMatter::parse($viewHTML);

        return (object) [
            'content' => $viewParsed->body(),
            'params' => $viewParsed->matter(),
        ];
    }
}
