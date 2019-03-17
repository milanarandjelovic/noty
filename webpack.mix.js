let mix = require('laravel-mix');

mix
  .copy('node_modules/jquery/dist/jquery.js', 'publishable/assets/js/jquery.js')
  .copy('node_modules/toastr/build/toastr.css', 'publishable/assets/css/toastr.css')
  .copy('node_modules/toastr/build/toastr.min.js', 'publishable/assets/js/toastr.min.js');
