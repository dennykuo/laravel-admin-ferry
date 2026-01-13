<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\View\Components\Pages\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * 重設密碼頁面組件
 *
 * 提供一個重設密碼表單，讓用戶可以設定新密碼。
 */
class ResetPassword extends Component
{
    /**
     * 建立重設密碼組件實例
     *
     * @param string $submitUrl 重設密碼表單提交的 URL
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
        return view('admin-ferry::auth.reset-password');
    }
}
