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

//mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css',
], 'public/css/styles.css');

mix.scripts([
    'resources/front/js/jquery-3.5.1.slim.js',
    'resources/front/js/bootstrap.js',
], 'public/js/scripts.js');

mix.copyDirectory('resources/front/img', 'public/img');

mix.browserSync('kurs.webfont.laravel2021.local');
