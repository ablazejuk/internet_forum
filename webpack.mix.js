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
    'resources/assets/theme/adminlte/AdminLTE/css/ionicons.min.css',
    'resources/assets/theme/adminlte/AdminLTE/css/datatables/dataTables.bootstrap.css',
    'resources/assets/theme/adminlte/AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    'resources/assets/theme/adminlte/AdminLTE/css/AdminLTE.css',
    'resources/assets/css/kaushan_script.css',
    'resources/assets/css/source_sans_pro.css',
    'resources/assets/css/custom.css'
], 'public/css/app.css');

mix.combine([
    'resources/assets/js/jquery.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/jquery-ui-1.10.3.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/bootstrap.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/plugins/datatables/jquery.dataTables.js',
    'resources/assets/theme/adminlte/AdminLTE/js/plugins/datatables/dataTables.bootstrap.js',
    'resources/assets/theme/adminlte/AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'resources/assets/theme/adminlte/AdminLTE/js/AdminLTE/app.js',
    'resources/assets/js/app.js',
    'resources/assets/js/threads.js',
], 'public/js/app.js');

// Images
mix.copy('resources/assets/theme/adminlte/AdminLTE/css/iCheck/minimal/minimal.png', 'public/css/iCheck/minimal/minimal.png');
mix.copyDirectory('resources/assets/theme/adminlte/AdminLTE/css/datatables/images', 'public/css/images');

//Fonts
mix.copy('resources/assets/fonts/kaushanscript/v6/qx1LSqts-NtiKcLw4N03IEd0sm1ffa_JvZxsF_BEwQk.woff2', 'public/fonts/kaushanscript/v6/qx1LSqts-NtiKcLw4N03IEd0sm1ffa_JvZxsF_BEwQk.woff2');
mix.copyDirectory('resources/assets/fonts/sourcesanspro/v11', 'public/fonts/sourcesanspro/v11');

mix.version();