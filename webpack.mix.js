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

mix.styles([
     'resources/views/admin/css/style.css'
   , 'resources/views/admin/css/bootstrap-datepicker.css'
], 'public/admin/css/style.css')

.scripts([
     'resources/views/admin/js/script.js'
   , 'resources/views/admin/js/bootstrap-datepicker.min.js'
   , 'resources/views/admin/js/bootstrap-datepicker.pt-BR.min.js'
   , 'resources/views/admin/js/mascaras/sinon-1.10.3.js'
   , 'resources/views/admin/js/mascaras/sinon-qunit-1.0.0.js'
   , 'resources/views/admin/js/mascaras/jquery.mask.js'
   , 'resources/views/admin/js/mascaras/jquery.mask.test.js'

], 'public/admin/js/script.js')

.version();