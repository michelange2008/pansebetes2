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
 mix.webpackConfig({
     stats: {
         children: false,
     },
 });

 mix.setPublicPath('public/');
 mix.sass('resources/sass/app.scss', 'css')
   .options({
       processCssUrls: false
    })
    .js('resources/js/app.js', 'js');

    mix.copy('node_modules/bootstrap-table/dist/bootstrap-table.min.css', 'public/css/bootstrap-table.min.css');
mix.copy('node_modules/jquery-confirm/dist/jquery-confirm.min.css', 'public/css/jquery-confirm.min.css');

mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('node_modules/jquery-ui-bundle/jquery-ui.min.js', 'public/js/jquery-ui.min.js');
mix.copy('node_modules/jquery-confirm/dist/jquery-confirm.min.js', 'public/js/jquery-confirm.min.js');
mix.copy('node_modules/bootstrap-table/dist/locale/bootstrap-table-fr-FR.min.js', 'public/js/bootstrap-table-fr-FR.min.js');
mix.copy('node_modules/bootstrap-table/dist/bootstrap-table.min.js', 'public/js/bootstrap-table.min.js');
