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

mix.combine([
    'resources/assets/theme/adminlte/AdminLTE/css/bootstrap.min.css',
    'resources/assets/theme/adminlte/AdminLTE/css/font-awesome.min.css',
    'resources/assets/theme/adminlte/AdminLTE/css/ionicons.css',
    'resources/assets/theme/adminlte/AdminLTE/css/AdminLTE.css',
    'resources/assets/css/custom.css'
], 'public/css/app.css');

mix.combine([
    'resources/assets/js/jquery.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/jquery-ui-1.10.3.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/bootstrap.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/AdminLTE/app.js'
], 'public/js/app.js');

mix.copy('resources/assets/theme/adminlte/AdminLTE/css/iCheck/minimal/minimal.png', 'public/css/iCheck/minimal/minimal.png');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();