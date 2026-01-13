<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\View\Components\Pages\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * 登入頁面組件
 *
 * 提供一個完整的登入頁面，包含帳號密碼欄位和忘記密碼連結。
 */
class Login extends Component
{
    /**
     * 建立登入組件實例
     *
     * @param string $submitUrl 登入表單提交的 URL
     * @param string|null $passwordResetUrl 忘記密碼頁面的 URL
     * @param string $heading 頁面標題
     */
    public function __construct(
        public readonly string $submitUrl,
        public readonly ?string $passwordResetUrl = null,
        public readonly string $heading = 'HELLO'
    ) {
    }

    /**
     * 取得組件的視圖內容
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('admin-ferry::auth.login');
    }
}
