let mix = require('laravel-mix');

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

   .copyDirectory('resources/assets/theme/', 'public/theme')
   .copyDirectory('resources/assets/theme2/', 'public/theme2')
   .copyDirectory('resources/assets/CKEditor/','public/CKEditor/')
   
   .copy('resources/assets/css/main1.css','public/css')
   .copy('resources/assets/js/jquery.tagsinput.js','public/js')
   .copy('resources/assets/js/tagsinput.js','public/js')
   .copy('resources/assets/css/main2.css','public/css')

   .version()
;
