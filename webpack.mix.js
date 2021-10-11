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

mix.js('resources/js/app.js' ,'public/js')
    .js("resources/js/blocklyBase", "public/js")
    .js("resources/js/blocklyGraph", "public/js")
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();


    /***
     * https://stackoverflow.com/questions/67881252/js-files-not-loading-using-webpack-laravel-mix-in-laravel-8
     * 
     * mix.scripts([
     * 'public/js/admin.js',
     * 'public/js/dashboard.js'
     * ], 'public/js/all.js');
     */