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

mix.js('resources/assets/js/admin/admins/launch.js', 'js/admin/admins/launch.js');

mix.js('resources/assets/js/admin/designers/launch.js', 'js/admin/designers/launch.js');

mix.js('resources/assets/js/admin/users/launch.js', 'js/admin/users/launch.js');
