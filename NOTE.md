# 技術棧 Stack

## Frontend
- **Build Tool**: Vite v6
- **Framework**: Vue 3 (v3.5+)
- **CSS Framework**: Tailwind CSS v4.0
    - Plugins: Forms, Typography
    - Includes auto-prefixing (autoprefixer removed)
- **CSS Processor**: PostCSS v8.4
    - Features: Nesting, Import, Extend Rule
- **Icons**:
    - FontAwesome v6
    - CSS.gg v2
- **Interactivity & Utilities**:
    - HTMX v2
    - jQuery v3.7
    - VanillaJS Datepicker v1.3
    - Noty v3.2 (Notifications)

## Backend (PHP/Laravel)
- **PHP Version**: 8.0 - 8.3
- **Laravel Support**: 8.x, 9.x, 10.x, 11.x
- **Core Packages**:
    - `spatie/yaml-front-matter`: For parsing YAML configuration in views.
    - `spatie/laravel-html`: For form generation and HTML helpers.
- **Testing & Analysis**:
    - Pest / PHPUnit
    - PHPStan
    - Orchestra Testbench

# TODO

- 宿主無法使用未在專案中使用到的 tailwind class 樣式，解決方式：宿主使用 cdn，但此套件的 tailwind class 必須加上前綴
- 富文本編輯器
- publish 範本

# Branchs

master: 原本的 Laravel Vite 及 eva-icons，將來都會棄用，因有部分專案使用了，將來改 v1 時再替換為主分支，目前先不動
develop: 暫為 V0 時的主分支

use-laravel-html: 將 laravel 中改用 laravel-html 套件，為目前最主要版本

new: ai 優化過的版本，延伸自 use-laravel-html

# 開發備註

使用 Vite (非 Laravel Vite 集成) 作為資源編譯，因此使用此套件的宿主程式可以自由選擇使用 Vite 或 Laravel Vite。

考量使用套件的主程式可能也會使用 TailwindCSS 或 WindiCSS，為了防止樣式衝突，
此套件的 TailwindCSS 樣式都不寫在元素的 class 上做樣式描述 (如 class="mx-auto")，而在該元素的 class 命名上做對應樣式 (如 class="header")。

----------------------------------------------------------

# V1 版本依賴

- Frontend
    - 前端建構工具: Vite or Laravel Vite | 目前使用 Vite
    - Framework: Vue or Alpine | 目前使用 Vue
    - CSS Framework: WindyCSS or Tailwind or unocss | 目前使用 Tailwind
    - ICON: Fontawasome or css.gg or eva-icons (久未更新) | 目前使用 Fontawasome 及 css.gg
    - AJAX event: HTMX or Inertia or livewire
- PHP:
    - yaml: spatie/yaml-front-matter
    - form: laravelcollective/html or protonemedia/laravel-form-components | 目前使用 laravelcollective/html

考量 components 要使用 blade 還是 Vue

----------------------------------------------------------

## Install

``` composer require dennykuo/laravel-admin-ferry:dev-master ```

若要連結本地 package 做開發及測試時，在 composer.json 中新增下列 repositories 設定，
options.symlink 為 true 表示 link dir 的方式引入

```
"repositories": {
    "dennykuo/laravel-admin-ferry": {
        "type": "path",
        "url": "~/{path}/dennykuo/laravel-ferry-view",
        "options": {
            "symlink": true
        }
    }
},
```

----------------------------------------------------------

## Publish Config

第一次運行時執行

``` php artisan vendor:publish --tag=laravel-admin-ferry-config ```

## Publish/update assets

套件的 assets 有更新都要再次發佈做更新
TODO: 研究讓版本更新後，可以自動執行

``` php artisan laravel-admin-ferry:assets-publish ```

----------------------------------------------------------

## view 使用方式

controller 中

```
$data = 'foo';
$view = view('admin.index', compact('data'));
return adminView($view);
```

每個 view 都可藉由 yaml 做相關設定
目前有以下參數

```
page:
  name: {$pageName}
breadcrumb:
  {$name}: {$url}
```

view 中引用 blade components 的 nameapsce 為 x-admin，如下

<x-admin-ferry::foo.bar />

----------------------------------------------------------

## 套件名稱參考

- skeleton
- shell
- outline
- ferry
- broker

## 套件參考 (不一定在使用中)
- htmx: ajax 用
- https://github.com/turbolinks/turbolinks
- page: client 路由

## 日期選擇器套件參考
- https://mymth.github.io/vanillajs-datepicker
- https://icehaunter.github.io/vue3-datepicker/
- https://vcalendar.io
- https://github.com/chronotruck/vue-ctk-date-time-picker 未支援 vue 3，且久未維護了
- https://github.com/weifeiyue/vue-datepicker-local
- https://github.com/mengxiong10/vue2-datepicker
- https://github.com/t1m0n/air-datepicker
    日期範圍需要輸入 js Date 格式，稍不便，作者很久沒維護了
- https://github.com/uxsolutions/bootstrap-datepicker
- https://github.com/qiuyaofan/datepicker
- https://mcdatepicker.netlify.app
- https://github.com/livelybone/vue-datepicker
