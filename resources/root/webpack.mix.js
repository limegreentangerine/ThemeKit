let mix = require('laravel-mix')

/*
    |--------------------------------------------------------------------------
    | Mix Asset Management https://laravel-mix.com/docs/6.0/api
    |--------------------------------------------------------------------------
    |
    | Mix provides a clean, fluent API for defining some Webpack build steps
    | for your Laravel application. By default, we are compiling the Sass
    | file for your application, as well as bundling up your JS files.
    |
 */

mix
    // Make sure the public path is declared
    .setPublicPath('public')
    .js('resources/js/main.js', 'public/application/js/main.js')
    .sass('resources/css/main.scss', 'public/application/css/main.css')
    .ts('src/themes/{{THEME_NAME}}/ts/site.ts', 'public/application/themes/{{THEME_NAME}}/js')
    .sass('src/themes/{{THEME_NAME}}/scss/site.scss', 'public/application/themes/{{THEME_NAME}}/css')
