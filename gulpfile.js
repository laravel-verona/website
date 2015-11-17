var elixir = require('laravel-elixir');

// Force minify CSS and JavaScript files
elixir.config.production = true;

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
    mix
        .sass([
            'app.scss'
        ], 'public/assets/css/app.css')
        .styles([
            'public/assets/css/app.css',
            'node_modules/animate.css/animate.min.css'
        ], 'public/assets/css/all.css', './')
        .scripts([
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/jquery-countdown/dist/jquery.countdown.min.js',
            'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'resources/assets/js/app.js'
        ], 'public/assets/js/all.js', './')
        .version([
            'public/assets/css/all.css',
            'public/assets/js/all.js'
        ])
        .copy('resources/assets/images/', 'public/assets/images/');
});
