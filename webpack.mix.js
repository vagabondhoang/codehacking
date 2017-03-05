const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine([
   	'public/css/blog-post.css',
   	'public/css/metisMenu.css',
   	'public/css/sb-admin-2.css',
   	'public/css/styles.css',
      'public/css/bootstrap.css',
      'public/css/bootstrap.min.css',
      'public/css/font-awesome.css'
   	], 'public/css/libs.css')
   .combine([
      'public/js/jquery.js',
      'public/js/bootstrap.js',
      'public/js/bootstrap.min.js',
   	'public/js/metisMenu.js',
   	'public/js/sb-admin-2.js',
   	'public/js/scripts.js'
   	], 'public/js/libs.js');
