var gulp = require('gulp');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    
    mix.scripts([ 
	      'AdminLTE/bootstrap/js/bootstrap.min.js',
	      'AdminLTE/plugins/datatables/jquery.dataTables.min.js',
	      'AdminLTE/plugins/datatables/dataTables.bootstrap.min.js',
	      'AdminLTE/plugins/morris/morris.min.js',
	      'AdminLTE/plugins/knob/jquery.knob.js',
	      'AdminLTE/plugins/daterangepicker/daterangepicker.js',
	      'AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
	      'AdminLTE/plugins/fastclick/fastclick.js',
	      'AdminLTE/dist/js/app.min.js',
	      'AdminLTE/dist/js/demo.js',
	    ],
	    'public/backend/js/vendor.js',
	    'public/bower'
	);
	mix.styles([
		  'AdminLTE/bootstrap/css/bootstrap.min.css',
		  'AdminLTE/plugins/datatables/dataTables.bootstrap.css',
	  	  'AdminLTE/dist/css/AdminLTE.min.css',
	  	  'AdminLTE/dist/css/skins/_all-skins.min.css',
	  	  'AdminLTE/plugins/iCheck/flat/blue.css',
	  	  'AdminLTE/plugins/morris/morris.css',
	  	  'AdminLTE/plugins/datepicker/datepicker3.css',
	  	  'AdminLTE/plugins/daterangepicker/daterangepicker.css',	      
	  ], 
	    'public/backend/css/vendor.css',
	    'public/bower'
	);
});
