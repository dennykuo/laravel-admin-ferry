<?php

namespace Dennykuo\AdminView;

use Spatie\YamlFrontMatter\YamlFrontMatter;

class AdminView
{
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public static function make($view = null, $data = [], $mergeData = [])
    {
        $viewHTML = view($view, $data, $mergeData)->toHtml();
        $viewParsed = YamlFrontMatter::parse($viewHTML);
        $params = $viewParsed->matter();
        $content = $viewParsed->body();

        return view('admin-view::carrier', compact('content') + $params, $mergeData);
    }
}
