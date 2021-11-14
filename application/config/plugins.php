<?php
defined('BASEPATH') or exit('No direct script access allowed');
$config['datatables'] = [
	'scripts' => [
		'assets/plugins/datatables/jquery.dataTables.min.js',
		'assets/plugins/datatables/jquery.dataTables.min.js',
		'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
		'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js',
		'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
	],
	'styles' => [
		'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
		'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
		'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'
	]
];

$config['datatables-btn'] = [
	'scripts' => [
		'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js',
		'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
		'assets/plugins/datatables-buttons/js/buttons.html5.min.js',
		'assets/plugins/datatables-buttons/js/buttons.print.min.js',
		'assets/plugins/datatables-buttons/js/buttons.colVis.min.js',
		'assets/plugins/jszip/jszip.min.js',
		'assets/plugins/pdfmake/pdfmake.min.js',
		'assets/plugins/pdfmake/vfs_fonts.js'
	]
];

$config['validation'] = [
	'scripts' => [
		'assets/plugins/jquery-validation/jquery.validate.min.js',
		'assets/plugins/jquery-validation/additional-methods.min.js'
	]
];

$config['plot'] = [
	'scripts' => [
		'assets/plugins/flot/jquery.flot.js',
		'assets/plugins/flot/plugins/jquery.flot.resize.js',
		'assets/plugins/flot/plugins/jquery.flot.pie.js',
	]
];

$config['icheck'] = [
	'styles' => [
		'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'
	]
];

$config['select2'] = [
	'styles' => [
		'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
		'assets/plugins/select2/css/select2.min.css'
	],
	'scripts' => [
		'assets/plugins/select2/js/select2.full.min.js',
	]
];

$config['daterangepicker'] = [
	'styles' => [
		'assets/plugins/daterangepicker/daterangepicker.css',
	],
	'scripts' => [
		'assets/plugins/moment/moment.min.js',
		'assets/plugins/daterangepicker/daterangepicker.js',
	]
];

$config['moment'] = [
	'scripts' => [
		'assets/plugins/moment/moment.min.js'
	]
];

$config['summernote'] = [
	'styles' => [
		'assets/plugins/summernote/summernote-bs4.css'
	],
	'scripts' => [
		'assets/plugins/summernote/summernote-bs4.js'
	]
];

$config['summernote-audio'] = [
	'styles' => [
		'assets/plugins/summernote-audio/summernote-audio.css'
	],
	'scripts' => [
		'assets/plugins/summernote-audio/summernote-audio.js'
	]
];

$config['masonry'] = [
	'scripts' => [
		'assets/plugins/masonry/masonry.pkgd.min.js'
	]
];

$config['switch'] = [
	'styles' => [
		'assets/plugins/bootstrap-switch-button/css/bootstrap-switch-button.min.css'
	],
	'scripts' => [
		'assets/plugins/bootstrap-switch-button/js/bootstrap-switch-button.min.js'
	]
];
