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
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/blocks/list.js', 'public/js')
    .js('resources/js/var/var.js', 'public/js')
    .js('resources/js/modules/modules.js', 'public/js')
    .js('resources/js/modules/form.js', 'public/js/modules')
    .js('resources/js/menu/menu.js', 'public/js')
    .js('resources/js/additions/form.js', 'public/js/additions')
    .js('resources/js/seo/form.js', 'public/js/seo')
    .js('resources/js/pages/form.js', 'public/js/pages')
    .js('resources/js/block_templates/load.js', 'public/js')
    .js('resources/js/block_templates/create.js', 'public/js/block_templates')
    .js('resources/js/block_templates/sort.js', 'public/js/block_templates')
    .sourceMaps();

// mix.sass('resources/sass/app.scss', 'public/css')
mix.sass('resources/sass/admin.scss', 'public/css/')
    .sass('resources/sass/main.scss', 'public/css/style.css')
    // .sass('resources/sass/_fonts.scss', 'public/css/fonts.css')
;

mix.combine([
    'resources/js/jquery-3.5.1.js',
    'resources/js/swiper-bundle.js',
    'resources/js/aos.js',
    'resources/js/jquery.selectric.js',
    // 'resources/js/fresco.min.js',
    'resources/js/jquery.nested.js',
    'resources/js/scripts.js',
], 'public/js/common.js');

mix.minify('public/js/common.js');

