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

mix.sass('resources/scss/style.scss','public/admin/css/style.css')
    .js('resources/js/app.js', 'public/admin/js')
    .js('resources/js/client.js', 'public/admin/js')
    .js('resources/js/product.js', 'public/admin/js')
    .js('resources/js/order.js', 'public/admin/js');
    // .js('resources/js/order.js', 'public/admin/js');

    // .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/admin/bootstrap.js');

// .js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]
