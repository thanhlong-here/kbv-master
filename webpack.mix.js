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

mix.js(['resources/assets/js/app.js',
        'resources/assets/js/app-menu.js',
        'resources/assets/vendors/js/extensions/pace.min.js',
        'resources/assets/vendors/js/ui/jquery-sliding-menu.js',
        'resources/assets/vendors/js/ui/jquery.matchHeight-min.js',
        'resources/assets/vendors/js/ui/blockUI.min.js',
        'resources/assets/vendors/js/ui/unison.min.js',
        'resources/assets/vendors/js/ui/perfect-scrollbar.jquery.min.js',
        'resources/assets/vendors/js/ui/tether.min.js',
        'resources/assets/vendors/js/forms/select/select2.full.min.js',
      ],
        'public/js/app.js')
   .sass('resources/assets/scss/app.scss', 'public/css/')
   .sass('resources/assets/scss/bootstrap.scss', 'public/css/')
   .sass('resources/assets/scss/bootstrap-extended.scss', 'public/css/')
   .sass('resources/assets/scss/colors.scss', 'public/css/')
   .sass('resources/assets/fonts/flag-icon-css/sass/flag-icon.scss', 'public/css/')
   .sass('resources/assets/scss/custom-rtl.scss', 'public/css/')
   .styles(['resources/assets/css/core/menu/menu-types/vertical-menu.css',
            'resources/assets/fonts/feather/style.css',
            'resources/assets/fonts/font-awesome/css/font-awesome.css',
            'resources/assets/css/core/menu/menu-types/vertical-overlay-menu.css',
          ], 'public/css/all.css');

  // .sass('resources/assets/scss/bootstrap-extended.scss', 'public/css/')
  // .sass('resources/assets/scss/colors.scss', 'public/css/');
