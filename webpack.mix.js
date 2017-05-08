const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .styles([
       'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
       'resources/assets/css/material-dashboard.css',
       'resources/assets/css/theme.css',
       'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
       'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons'
   ], 'public/css/app.css');
