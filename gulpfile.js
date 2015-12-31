var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
 mix.sass('app.scss')
     //.copy('node_modules/jquery-ui/themes/smoothness/images/', 'public/images/smoothness/')
     //.copy('node_modules/jquery-ui/themes/smoothness/jquery-ui.min.css', 'resources/assets/css/smoothness/jquery-ui.min.css')
     //.copy('public/images/', 'public/build/images/')
     .browserify('app.js')
     .styles([
         'smoothness/jquery-ui.min.css'
     ], 'public/css/all.css')
     .scripts([
         'main.js'
     ]);
});