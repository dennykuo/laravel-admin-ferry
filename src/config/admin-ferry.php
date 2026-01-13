<?php

return [
    'name' => '後台',

    'home-link-type' => 'url', // route or url
    'home' => '/',

    'nav-view' => null, // view path, null
    'nav-link-type' => 'route', // route or url
    'nav' => [
        // 'link name' => 'route name' or 'url', <- 連結
        // 'label' => null, <- 分類提示
    ],

    'scripts-view' => null, // view path, null

    'header-toolbar-view' => null, // view path, null

    'favicons' => [
        ['type' => 'image/png', 'size' => '32x32', 'path' => '/vendor/laravel-admin-ferry/img/favicon/favicon-32x32.png'],
    ],
];
