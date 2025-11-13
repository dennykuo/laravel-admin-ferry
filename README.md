# Laravel Admin Ferry

[![PHP Version](https://img.shields.io/badge/PHP-%5E8.0-blue)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-8%2B-red)](https://laravel.com)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

一個現代化的 Laravel 後台管理系統套件，整合 Tailwind CSS、Vue.js 和 HTMX，提供優雅且高效的管理介面開發體驗。

## 特色功能

- 🎨 **現代化設計** - 基於 Tailwind CSS 2.0 的響應式設計
- ⚡ **高效開發** - 豐富的 Blade 組件庫，開箱即用
- 🔄 **動態載入** - 整合 HTMX 實現無刷新頁面更新
- 📝 **YAML Front Matter** - 在視圖中使用 YAML 配置頁面元數據
- 🎯 **Vue.js 整合** - 支援 Vue.js 2.x 進行互動式組件開發
- 🌐 **多語言支援** - 內建繁體中文語言包
- 📦 **模組化架構** - 清晰的目錄結構，易於擴展
- 🔒 **安全可靠** - 遵循 Laravel 最佳實踐

## 系統需求

- PHP 8.0 或更高版本
- Laravel 8.x / 9.x / 10.x / 11.x
- Composer

## 安裝

### 1. 透過 Composer 安裝套件

```bash
composer require dennykuo/laravel-admin-ferry:dev-master
```

### 2. 發布配置文件（首次安裝）

```bash
php artisan vendor:publish --tag=laravel-admin-ferry:config
```

這會在 `config/admin-ferry.php` 創建配置文件。

### 3. 發布或更新資源文件

```bash
php artisan laravel-admin-ferry:assets-publish
```

此命令會在 `public/vendor/laravel-admin-ferry` 創建指向套件資源的符號連結。

> **注意**：在 Windows 系統上，您可能需要以管理員權限運行命令提示字元。

## 基本使用

### 在 Controller 中使用

```php
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $view = view('admin.customers.index', compact('customers'));

        // 使用 adminView() 包裝視圖
        return adminView($view);
    }
}
```

### 視圖中使用 YAML Front Matter

在 Blade 視圖頂部添加 YAML 配置：

```blade
---
page:
  name: 客戶管理
breadcrumb:
  首頁: /admin
  客戶: /admin/customers
---

<div class="container">
    <h1>客戶列表</h1>
    <!-- 您的內容 -->
</div>
```

### 使用 Blade 組件

套件提供豐富的 Blade 組件，命名空間為 `admin-ferry`：

```blade
<!-- 表單輸入框 -->
<x-admin-ferry::forms.input
    name="email"
    label="電子郵件"
    type="email"
    required
/>

<!-- 選擇框 -->
<x-admin-ferry::forms.select
    name="status"
    label="狀態"
    :options="['active' => '啟用', 'inactive' => '停用']"
/>

<!-- 日期選擇器 -->
<x-admin-ferry::forms.datepicker
    name="birthday"
    label="生日"
/>

<!-- 數據表格 -->
<x-admin-ferry::tables.data-table
    :data="$customers"
    :columns="['name', 'email', 'created_at']"
/>

<!-- 提交按鈕 -->
<x-admin-ferry::forms.submit text="儲存" />
```

## 配置

編輯 `config/admin-ferry.php` 來自訂配置：

```php
return [
    // 應用程式名稱
    'name' => '後台管理系統',

    // 首頁連結類型：'route' 或 'url'
    'home-link-type' => 'route',

    // 導航選單配置
    'nav' => [
        [
            'name' => '首頁',
            'route' => 'admin.dashboard',
            'icon' => 'home',
        ],
        [
            'name' => '客戶管理',
            'route' => 'admin.customers.index',
            'icon' => 'people',
        ],
    ],

    // 自訂腳本視圖
    'scripts-view' => null,

    // 自訂頭部工具列視圖
    'header-toolbar-view' => null,

    // Favicon 配置
    'favicons' => [
        '16' => admin_asset('img/favicon/favicon-16x16.png'),
        '32' => admin_asset('img/favicon/favicon-32x32.png'),
    ],
];
```

## 輔助函數

套件提供以下全域輔助函數：

### `adminView(View $view)`

將視圖包裝在 admin-ferry 佈局中，並解析 YAML front matter。

```php
return adminView(view('admin.dashboard'));
```

### `admin_asset(?string $path = null)`

取得套件資源的 URL 路徑。

```php
<link href="{{ admin_asset('css/dist/app.css') }}" rel="stylesheet">
<script src="{{ admin_asset('js/dist/app.js') }}"></script>
```

### `admin_asset_mix(?string $path)`

取得經過 Laravel Mix 版本控制的資源路徑。

```php
<link href="{{ admin_asset_mix('css/dist/app.css') }}" rel="stylesheet">
```

### `admin_base_path(?string $path = null)`

取得套件的基礎路徑。

```php
$configPath = admin_base_path('src/config/admin-ferry.php');
```

## 可用組件

### 表單組件

- `forms.input` - 文字輸入框
- `forms.select` - 下拉選擇器
- `forms.checkbox` - 核取方塊
- `forms.radio` - 單選按鈕
- `forms.toggle` - 開關切換
- `forms.datepicker` - 日期選擇器
- `forms.file` - 檔案上傳
- `forms.form-group` - 表單組包裝器
- `forms.submit` - 提交按鈕

### 數據展示組件

- `tables.data-table` - 數據表格
- `tables.no-data` - 無資料提示
- `data.rank` - 排名顯示
- `data.number-stats` - 數據統計
- `elements.badge` - 標籤徽章

### 提示組件

- `alert.notify` - 通知訊息
- `alert.error` - 錯誤提示

### 頁面元件

- `header.dropdown` - 頭部下拉選單

## 圖示系統

套件使用 [Eva Icons](https://akveo.github.io/eva-icons) 圖示庫（CSS 版本）。

使用方式：

```html
<i class="eva eva-home"></i>
<i class="eva eva-person"></i>
<i class="eva eva-settings"></i>
```

## 本地開發

如果您想在本地開發或修改此套件：

### 1. 在 composer.json 中配置本地路徑

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "/path/to/laravel-admin-ferry",
            "options": {
                "symlink": true
            }
        }
    ]
}
```

### 2. 安裝套件

```bash
composer require dennykuo/laravel-admin-ferry:@dev
```

### 3. 前端資源編譯

```bash
# 安裝 NPM 依賴
npm install

# 編譯資源
npm run mix

# 監聽變更
npm run mix watch

# 編譯 vendor 資源
npm run mix --vendor
```

## 測試

套件包含完整的測試套件：

```bash
# 執行所有測試
composer test

# 執行測試並生成覆蓋率報告
composer test-coverage
```

## 專案結構

```
laravel-admin-ferry/
├── src/                          # PHP 原始碼
│   ├── Commands/                 # Artisan 命令
│   ├── Concerns/                 # Traits
│   ├── View/Components/          # Blade 組件類別
│   └── config/                   # 配置文件
├── views/                        # Blade 視圖模板
│   ├── components/               # 可重用組件
│   ├── layouts/                  # 佈局模板
│   ├── partials/                 # 頁面部分
│   └── auth/                     # 認證視圖
├── assets/                       # 前端資源
│   ├── js/                       # JavaScript
│   ├── css/                      # CSS/Tailwind
│   ├── fonts/                    # 字體文件
│   └── img/                      # 圖片資源
├── boilerplate/                  # 範例專案
├── tests/                        # 測試文件
└── README.md                     # 說明文件
```

## Boilerplate 範例

套件包含完整的範例應用程式（位於 `boilerplate/` 目錄），展示如何：

- 設定認證系統
- 建立 CRUD 控制器
- 使用表單驗證
- 整合活動日誌追蹤
- 配置路由和選單

## 技術棧

### 後端
- **PHP**: 8.0+
- **Laravel**: 8.x / 9.x / 10.x / 11.x
- **Spatie YAML Front Matter**: 視圖元數據解析
- **LaravelCollective HTML**: 表單輔助工具

### 前端
- **Tailwind CSS**: 2.0.4 - 原子化 CSS 框架
- **Vue.js**: 2.6.12 - 前端框架
- **HTMX**: 1.4.1 - 動態 HTML 交換
- **jQuery**: 3.6.0 - DOM 操作
- **Eva Icons**: 1.1.3 - 圖示庫
- **Noty**: 通知系統
- **Laravel Mix**: 前端構建工具

## 常見問題

### Q: 為什麼在 Windows 上無法創建符號連結？

A: Windows 需要管理員權限才能創建符號連結。請以管理員身份運行命令提示字元，然後執行 `php artisan laravel-admin-ferry:assets-publish`。

### Q: 如何自訂樣式？

A: 您可以在自己的專案中覆寫套件的 CSS，或修改 Tailwind 配置文件來自訂主題。

### Q: 支援 Vue 3 嗎？

A: 目前套件使用 Vue 2.x。升級到 Vue 3 的計劃在路線圖中。

### Q: 如何添加自訂導航選單？

A: 編輯 `config/admin-ferry.php` 中的 `nav` 陣列來配置選單項目。

## 貢獻

歡迎提交 Pull Request 或回報 Issue！

## 授權

本套件採用 [MIT License](LICENSE) 授權。

## 致謝

- [Tailwind CSS](https://tailwindcss.com/)
- [Vue.js](https://vuejs.org/)
- [HTMX](https://htmx.org/)
- [Eva Icons](https://akveo.github.io/eva-icons/)
- [Laravel](https://laravel.com/)

---

**開發者**: Denny Kuo
**套件名稱**: dennykuo/laravel-admin-ferry
