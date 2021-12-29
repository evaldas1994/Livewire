const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .react()
    .copyDirectory('resources/theme','public/theme')
    .js('resources/js/main.js','public/js')
    .copyDirectory('resources/js/resizable-table-columns','public/js/resizable-table-columns')
    .css('resources/css/app.css', 'public/css');
