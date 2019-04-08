const mix = require('laravel-mix');

mix
    .setPublicPath('public')
    .js('resources/js/app.js', 'public')
    .postCss('resources/css/app.css', 'public');

if (mix.inProduction()) {
    mix.version();
}
