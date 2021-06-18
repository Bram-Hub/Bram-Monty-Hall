const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ])
    .postCss('resources/css/education.css', 'public/css', [
        require('tailwindcss')
    ])
    .postCss('resources/css/navigation.css', 'public/css', [
        require('tailwindcss')
    ])
    .postCss('resources/css/database.css', 'public/css', [
        require('tailwindcss')
    ])
    .postCss('resources/css/footer.css', 'public/css', [
        require('tailwindcss')
    ])
    .postCss('resources/css/about.css', 'public/css', [
        require('tailwindcss')
    ]);
