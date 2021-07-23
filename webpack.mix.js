let mix = require('laravel-mix');

mix.setPublicPath('./assets'); // for mix-manifest.json publish

/*
|--------------------------------------------------------------------------
| BrowserSync
|--------------------------------------------------------------------------
*/
// mix.browserSync({
//     proxy: 'laravel-admin-templete',
//     files: [
//         'assets/**/dist',
//         'src',
//         'views'
//     ],
//     cors: true,
//     open: false
// });

/*
|--------------------------------------------------------------------------
| Javascropt
|--------------------------------------------------------------------------
*/
// App JS
// --------------------
mix.js('assets/js/src/app.js', 'assets/js/dist')
   .sourceMaps()
   .version();

/*
|--------------------------------------------------------------------------
| CSS
|--------------------------------------------------------------------------
*/
// Tailwind CSS
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


/*
|--------------------------------------------------------------------------
| Vendor
|--------------------------------------------------------------------------
*/
// require('./webpack.mix-vendor.js');
