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
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/js/page_user/css/bootstrap.min.css',
    'resources/js/page_user/css/font-awesome.min.css',
    'resources/js/page_user/css/flaticon.css',
    'resources/js/page_user/css/animate.css',
    'resources/js/page_user/css/style.css',
    ],  'public/css/all.css');

mix.styles([
    'resources/js/page_user/css/blog.css',
    ],  'public/css/blog.css');


mix.js([
     'resources/js/page_user/js/owl.carousel.min.js',
     'resources/js/page_user/js/circle-progress.min.js',
     'resources/js/page_user/js/main.js',
     'resources/js/page_user/js/paginate.js',
 ],  'public/js/all.js');

 mix.copyDirectory([ 
    'resources/js/page_user/icon-fonts', 
    ],  'public/icon-fonts');