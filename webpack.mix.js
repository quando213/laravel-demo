const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/product-list.js', 'public/js')
    .js('resources/js/product-detail.js', 'public/js')
    .js('resources/js/cart.js', 'public/js')
    .js('resources/js/checkout.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [])
