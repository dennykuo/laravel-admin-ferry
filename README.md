## Install

``` composer require dennykuo/laravel-admin-view:dev-master ```

若要連結本地 package，composer.json 中新增，路徑可能會有修改，options.symlink 為 link dir 方式

```
"repositories": {
    "dennykuo/laravel-admin-view": {
        "type": "path",
        "url": "~/Dropbox/02-個人專案/laravel-admin-template/packages/dennykuo/laravel-admin-view",
        "options": {
            "symlink": true
        }
    }
},
```

## Publish Config

``` php artisan vendor:publish --tag=laravel-admin-view:config ```

## Publish/update assets

套件的 assets 有更新都要再次發佈做更新

``` php artisan laravel-admin-view:assets-publish ```

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

<x-admin::foo.bar />

## Icon font

含有兩套 icon font

- zwicon：圖檔形式 https://www.zwicon.com/
圖案細緻但久沒維護了，官方使用方式也有錯誤
如 <i class="more-v"></i> 應為 <i class="zwicon-more-v"></i>
可找替代或單純用 eva icons

- eva icons：
js、css 形式，https://akveo.github.io/eva-icons
