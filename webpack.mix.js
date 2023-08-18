//const { vue } = require('laravel-mix');
let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/scss/style.scss', 'public/css');

