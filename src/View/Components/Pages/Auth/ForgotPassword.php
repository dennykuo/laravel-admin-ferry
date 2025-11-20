<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\View\Components\Pages\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * 忘記密碼頁面組件
 *
 * 提供一個忘記密碼表單，讓用戶可以請求重設密碼連結。
 */
class ForgotPassword extends Component
{
    /**
     * 建立忘記密碼組件實例
     *
     * @param string $submitUrl 忘記密碼表單提交的 URL
     */
    public function __construct(
        public readonly string $submitUrl
    ) {
    }

    /**
     * 取得組件的視圖內容
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('admin-ferry::auth.forgot-password');
    }
}
