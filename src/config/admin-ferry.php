<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Panel Name
    |--------------------------------------------------------------------------
    |
    | 後台系統的顯示名稱，會出現在頁面標題、導航欄等位置
    |
    | 類型: string
    | 預設值: '後台'
    |
    */
    'name' => '後台',

    /*
    |--------------------------------------------------------------------------
    | Home Link Type
    |--------------------------------------------------------------------------
    |
    | 首頁連結的類型，決定 'home' 設定值的解析方式
    |
    | 可接受的值:
    |   - 'route': 使用 Laravel 路由名稱 (route('home'))
    |   - 'url': 使用直接的 URL 路徑 (url('/'))
    |
    | 預設值: 'url'
    |
    | 範例:
    |   'home-link-type' => 'route',
    |   'home' => 'admin.dashboard',
    |
    */
    'home-link-type' => 'url', // route or url

    /*
    |--------------------------------------------------------------------------
    | Home Page Path
    |--------------------------------------------------------------------------
    |
    | 首頁的路徑或路由名稱，根據 'home-link-type' 的設定來解析
    |
    | 類型: string
    | 預設值: '/'
    |
    | 範例:
    |   當 home-link-type 為 'url': 'home' => '/admin/dashboard'
    |   當 home-link-type 為 'route': 'home' => 'admin.dashboard'
    |
    */
    'home' => '/',

    /*
    |--------------------------------------------------------------------------
    | Custom Navigation View
    |--------------------------------------------------------------------------
    |
    | 自定義導航欄的視圖路徑，如果設定為 null 則使用預設導航
    |
    | 類型: string|null
    | 預設值: null
    |
    | 範例:
    |   'nav-view' => 'admin.partials.navigation',
    |
    */
    'nav-view' => null, // view path, null

    /*
    |--------------------------------------------------------------------------
    | Navigation Link Type
    |--------------------------------------------------------------------------
    |
    | 導航連結的類型，決定 'nav' 陣列中連結值的解析方式
    |
    | 可接受的值:
    |   - 'route': 使用 Laravel 路由名稱
    |   - 'url': 使用直接的 URL 路徑
    |
    | 預設值: 'route'
    |
    | 範例:
    |   'nav-link-type' => 'route',
    |   'nav' => [
    |       '用戶管理' => 'admin.users.index',
    |   ],
    |
    */
    'nav-link-type' => 'route', // route or url

    /*
    |--------------------------------------------------------------------------
    | Navigation Items
    |--------------------------------------------------------------------------
    |
    | 導航欄的項目設定，可以包含連結和分類標籤
    |
    | 類型: array
    | 預設值: []
    |
    | 結構說明:
    |   - 連結項目: 'link name' => 'route name' or 'url'
    |   - 分類標籤: 'label' => null
    |
    | 範例:
    |   'nav' => [
    |       '系統管理' => null,           // 分類標籤
    |       '用戶管理' => 'admin.users',   // 連結項目 (route)
    |       '角色管理' => 'admin.roles',   // 連結項目 (route)
    |       '內容管理' => null,           // 分類標籤
    |       '文章列表' => 'admin.posts',   // 連結項目 (route)
    |   ],
    |
    */
    'nav' => [
        // 'link name' => 'route name' or 'url', <- 連結
        // 'label' => null, <- 分類提示
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Scripts View
    |--------------------------------------------------------------------------
    |
    | 自定義腳本的視圖路徑，用於注入額外的 JavaScript 程式碼
    | 如果設定為 null 則不載入額外腳本
    |
    | 類型: string|null
    | 預設值: null
    |
    | 範例:
    |   'scripts-view' => 'admin.partials.scripts',
    |
    | 視圖檔案範例 (resources/views/admin/partials/scripts.blade.php):
    |   <script>
    |       // 你的自定義 JavaScript
    |       console.log('Admin panel loaded');
    |   </script>
    |
    */
    'scripts-view' => null, // view path, null

    /*
    |--------------------------------------------------------------------------
    | Header Toolbar View
    |--------------------------------------------------------------------------
    |
    | 自定義標題工具欄的視圖路徑，用於在頁面標題區域添加額外的工具按鈕或功能
    | 如果設定為 null 則不顯示額外工具欄
    |
    | 類型: string|null
    | 預設值: null
    |
    | 範例:
    |   'header-toolbar-view' => 'admin.partials.toolbar',
    |
    | 視圖檔案範例 (resources/views/admin/partials/toolbar.blade.php):
    |   <div class="flex gap-2">
    |       <button class="btn">新增</button>
    |       <button class="btn">匯出</button>
    |   </div>
    |
    */
    'header-toolbar-view' => null, // view path, null

    /*
    |--------------------------------------------------------------------------
    | Favicons Configuration
    |--------------------------------------------------------------------------
    |
    | 網站圖標 (favicon) 的配置設定，支援多種尺寸和格式
    |
    | 類型: array
    | 預設值: [['type' => 'image/png', 'size' => '32x32', 'path' => '/vendor/laravel-admin-ferry/img/favicon/favicon-32x32.png']]
    |
    | 結構說明:
    |   每個陣列元素應包含:
    |   - type: MIME 類型 (例如: 'image/png', 'image/x-icon')
    |   - size: 圖標尺寸 (例如: '32x32', '16x16', '192x192')
    |   - path: 圖標檔案路徑 (相對於 public 目錄)
    |
    | 範例:
    |   'favicons' => [
    |       ['type' => 'image/x-icon', 'size' => '16x16', 'path' => '/favicon.ico'],
    |       ['type' => 'image/png', 'size' => '32x32', 'path' => '/img/favicon-32x32.png'],
    |       ['type' => 'image/png', 'size' => '192x192', 'path' => '/img/favicon-192x192.png'],
    |   ],
    |
    */
    'favicons' => [
        ['type' => 'image/png', 'size' => '32x32', 'path' => '/vendor/laravel-admin-ferry/img/favicon/favicon-32x32.png'],
    ],
];
