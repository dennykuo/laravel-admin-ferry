# Laravel Admin Ferry

一個現代化的 Laravel 後台管理系統套件，整合 Tailwind CSS、Vue.js 和 HTMX，提供優雅的 YAML 前置內容視圖解析和組件化開發體驗。

[![Tests](https://img.shields.io/badge/tests-passing-brightgreen)]()
[![PHPStan](https://img.shields.io/badge/PHPStan-level%208-brightgreen)]()
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## ✨ 特性

- 🎨 **現代化設計** - 使用 Tailwind CSS 打造美觀的後台界面
- 📝 **YAML 前置內容** - 在視圖中使用 YAML 設定頁面元資料（標題、麵包屑等）
- 🧩 **組件化** - 豐富的 Blade 組件庫，快速構建後台頁面
- ⚡ **Vite 構建** - 使用 Vite 作為前端構建工具，支援熱重載
- 🔄 **AJAX 支援** - 自動判斷請求類型，返回適當的視圖包裝
- 🛡️ **安全性** - 內建路徑遍歷防護和輸入驗證
- 🧪 **完整測試** - 47 個測試用例，100% 通過率
- 📦 **零配置** - 開箱即用，自動發布資源

## 📋 需求

- PHP ^8.0 | ^8.1 | ^8.2 | ^8.3
- Laravel ^8.0 | ^9.0 | ^10.0 | ^11.0
- Node.js 16+ 和 NPM（用於前端資源編譯）

## 📦 安裝

### 1. 透過 Composer 安裝套件

```bash
composer require dennykuo/laravel-admin-ferry
```

### 2. 發布資源文件（自動執行）

套件安裝後會自動執行資源發布，如需手動發布：

```bash
php artisan laravel-admin-ferry:assets-publish
```

### 3. （可選）發布配置文件

如果需要自訂配置：

```bash
php artisan vendor:publish --tag=laravel-admin-ferry-config
```

## 🚀 快速開始

### 基本用法

在您的控制器中使用 `adminView()` 輔助函數包裝視圖：

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users' => 1250,
            'revenue' => 45000,
        ];

        $view = view('admin.dashboard', compact('data'));

        return adminView($view);
    }
}
```

### 在視圖中使用 YAML 前置內容

在您的 Blade 視圖檔案頂部添加 YAML 前置內容：

```blade
{{-- resources/views/admin/dashboard.blade.php --}}
---
name: 控制台
breadcrumb:
  - 首頁: /admin
  - 控制台: /admin/dashboard
---

<div class="dashboard">
    <h1>歡迎回來！</h1>
    <p>用戶數量：{{ $data['users'] }}</p>
    <p>總收益：${{ number_format($data['revenue']) }}</p>
</div>
```

### 使用 Blade 組件

套件提供了豐富的 Blade 組件：

```blade
{{-- 表單組件 --}}
<x-admin-ferry::forms.input
    name="email"
    label="電子郵件"
    type="email"
    required
/>

<x-admin-ferry::forms.select
    name="role"
    label="角色"
    :options="$roles"
/>

<x-admin-ferry::forms.datepicker
    name="birthday"
    label="生日"
/>

{{-- 按鈕組件 --}}
<x-admin-ferry::button type="submit" color="primary">
    儲存
</x-admin-ferry::button>

{{-- 區塊組件 --}}
<x-admin-ferry::section title="用戶資訊">
    <p>這裡是內容</p>
</x-admin-ferry::section>

{{-- 警告訊息 --}}
<x-admin-ferry::alert type="success">
    操作成功！
</x-admin-ferry::alert>
```

## 📖 進階使用

### AJAX 請求處理

Admin Ferry 會自動檢測請求類型：

- **一般請求**：返回完整的頁面布局（包含導航、側邊欄等）
- **AJAX 請求**：僅返回內容區域

```javascript
// 使用 AJAX 加載內容
fetch('/admin/users', {
    headers: {
        'X-Requested-With': 'XMLHttpRequest'
    }
})
.then(response => response.text())
.then(html => {
    document.getElementById('content').innerHTML = html;
});
```

### 生成模板文件

使用 Artisan 命令快速生成模板：

```bash
php artisan laravel-admin-ferry:make-template
```

會提示您選擇模板類型（表格或表單）和輸出位置。

### 自訂資源路徑

在 `config/admin-ferry.php` 中配置：

```php
return [
    'name' => env('ADMIN_FERRY_NAME', 'Admin Panel'),
    'home' => env('ADMIN_FERRY_HOME', '/admin'),
    'assets-path' => 'vendor/laravel-admin-ferry',
];
```

或在 `.env` 文件中設定：

```env
ADMIN_FERRY_NAME="我的後台"
ADMIN_FERRY_HOME="/dashboard"
```

## 🎨 開發本地套件

如果您需要修改套件並在本地測試：

### 1. 在 `composer.json` 中添加本地路徑

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-admin-ferry",
            "options": {
                "symlink": true
            }
        }
    ]
}
```

### 2. 安裝本地套件

```bash
composer require dennykuo/laravel-admin-ferry:@dev
```

### 3. 編譯前端資源

```bash
cd vendor/dennykuo/laravel-admin-ferry
npm install
npm run dev    # 開發模式
npm run build  # 生產模式
```

## 🔧 API 參考

### 輔助函數

#### `adminView(View $view)`

包裝視圖並添加後台布局。

```php
return adminView(view('admin.users'));
```

#### `admin_base_path(?string $path = null)`

獲取套件的基礎路徑。

```php
$path = admin_base_path('assets/css');
// 返回: /path/to/vendor/dennykuo/laravel-admin-ferry/assets/css
```

#### `admin_asset(?string $path = null)`

獲取套件的公開資源路徑。

```php
$cssPath = admin_asset('css/app.css');
// 返回: /vendor/laravel-admin-ferry/css/app.css
```

#### `admin_asset_mix(?string $path = null)`

獲取版本化的資源路徑（從 manifest.json）。

```php
$jsPath = admin_asset_mix('js/app.js');
// 返回: /vendor/laravel-admin-ferry/js/app.js?id=abc123
```

### Artisan 命令

#### 發布資源

```bash
php artisan laravel-admin-ferry:assets-publish
```

創建或更新套件資源的符號鏈接。

#### 生成模板

```bash
php artisan laravel-admin-ferry:make-template
```

互動式生成表格或表單模板文件。

## 📦 可用組件

### 表單組件

- `forms.input` - 文字輸入框
- `forms.select` - 下拉選單
- `forms.checkbox` - 核取方塊
- `forms.radio` - 單選按鈕
- `forms.toggle` - 切換開關
- `forms.file` - 檔案上傳
- `forms.datepicker` - 日期選擇器
- `forms.submit` - 提交按鈕

### UI 組件

- `button` - 按鈕
- `section` - 內容區塊
- `alert` - 警告訊息
- `modal` - 彈出視窗
- `search` - 搜尋框

### 資料顯示

- `data.box` - 資料卡片
- `data.stats` - 統計數據
- `tables.data-table` - 資料表格
- `tables.no-data` - 無資料提示

### 頁面組件

- `header.dropdown` - 標題下拉選單
- 麵包屑（breadcrumb）
- 導航（navigation）

## 🧪 測試

運行套件測試：

```bash
# 使用 Pest
composer test

# 使用 PHPUnit
composer test:phpunit

# 測試覆蓋率報告
composer test:coverage

# PHPStan 靜態分析
composer analyse
```

## 🤝 貢獻

歡迎提交 Issue 和 Pull Request！在提交之前，請確保：

1. 所有測試通過：`composer test`
2. PHPStan 檢查通過：`composer analyse`
3. 代碼符合 PSR-12 規範

## 📝 變更日誌

請參閱 [CHANGELOG.md](CHANGELOG.md) 查看詳細的版本變更記錄。

## 🔒 安全性

如果您發現安全漏洞，請查看 [SECURITY.md](SECURITY.md) 了解如何負責任地報告。

## 📄 授權

MIT License. 請參閱 [LICENSE](LICENSE) 文件以獲取更多資訊。

## 👏 致謝

- [Laravel](https://laravel.com) - 優雅的 PHP 框架
- [Tailwind CSS](https://tailwindcss.com) - 實用優先的 CSS 框架
- [Vue.js](https://vuejs.org) - 漸進式 JavaScript 框架
- [HTMX](https://htmx.org) - 高性能的 HTML 增強
- [Spatie](https://spatie.be) - YAML Front Matter 解析

## 🔗 相關連結

- [問題回報](https://github.com/dennykuo/laravel-admin-ferry/issues)
- [功能請求](https://github.com/dennykuo/laravel-admin-ferry/issues/new)

---

使用 ❤️ 和 ☕ 打造
