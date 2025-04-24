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

mix.copy('resources/utils', 'public/assets');
mix.copy('resources/img', 'public/img');
mix.copy('resources/utils', 'public/css');
mix.copy('resources/fonts', 'public/fonts');

mix.styles([
    'resources/utils/bootstrap.min.css',
    'resources/utils/magic.min.css',
    'resources/utils/main.css',
    'resources/utils/magnific-popup.css',
    'resources/utils/magnific-popup-zoom-gallery.css',
    'resources/utils/owl.carousel.css',
    'resources/utils/owl.theme.css',
    'resources/utils/owl.transitions.css',
    'resources/utils/bbt.css',
], 'public/css/main.css').version();

mix.css('resources/css/app.css', 'public/custom-css')

mix.scripts([
    'resources/utils/jquery.min.js',
    'resources/utils/bootstrap.min.js',
    'resources/utils/jquery.magnific-popup.min.js',
    'resources/utils/magnific-popup-zoom-gallery.js',
    'resources/utils/bootstrap-progressbar.js',
    'resources/utils/bootstrap-progressbar-main.js',
    'resources/utils/jquery.appear.js',
    'resources/utils/isotope.pkgd.min.js',
    'resources/utils/parallax.min.js',
    'resources/utils/jquery.countTo.js',
    'resources/utils/owl.carousel.min.js',
    'resources/utils/ion.rangeSlider.min.js',
    'resources/utils/imagesloaded.pkgd.min.js',
    'resources/utils/main.js',
], 'public/js/all.js').version();
