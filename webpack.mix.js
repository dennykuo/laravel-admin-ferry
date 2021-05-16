let mix = require('laravel-mix');

mix.setPublicPath(`./assets`); // for mix-manifest.json publish

/*
|--------------------------------------------------------------------------
| BrowserSync
|--------------------------------------------------------------------------
*/
mix.browserSync({
    proxy: 'laravel-admin-templete',
    files: [
        'assets/**/dist',
        'src',
        'views'
    ],
    cors: true,
    open: false
});

/*
|--------------------------------------------------------------------------
| Javascropt
|--------------------------------------------------------------------------
*/
// Vendor JS
// --------------------
// mix.combine(
//     [
//         'node_modules/kutty/dist/kutty.min.js'
//     ],
//     'assets/js/dist/vendor.js'
// );

// APP JS
// --------------------
mix.js('assets/js/src/app.js', 'assets/js/dist')
   .sourceMaps()
   .version();

/*
|--------------------------------------------------------------------------
| CSS
|--------------------------------------------------------------------------
*/
// tailwind css
// --------------------
require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

if (mix.inProduction()) {
    processProductionCSS();
} else {
    processDevCSS();
}

function processDevCSS() {
    // 未 purge
    mix.postCss('assets/css/src/app.css', 'assets/css/dist')
        .options({
            processCssUrls: false,
        })
        .tailwind()
        .version();
}

function processProductionCSS() {
    // purge
    mix.postCss('assets/css/src/app.css', 'assets/css/dist/app.min.css')
        .options({
            processCssUrls: false,
        })
        .tailwind()
        .purgeCss({
            enabled: true,
            extend: {
                content: [
                    '**/*.html',
                    '**/*.blade.php'
                ]
            }
        })
        .version();
}

// Vendor CSS
// --------------------
// mix.combine(
//     [
//         'node_modules/material-design-icons/iconfont/material-icons.css'
//     ],
//     'assets/css/dist/vendor.css'
// );
