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

mix
    .js('resources/js/index.js', 'public/js')
    .postCss('resources/css/main.css', 'public/css', [
        require('tailwindcss'),
    ]);

mix.copyDirectory(
    'node_modules/source-code-pro',
    'public/vendor/source-code-pro'
);
