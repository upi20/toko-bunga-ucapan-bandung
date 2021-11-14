<!DOCTYPE html>
<html lang="id-id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?> | <?= $app_name ?></title>

	<!-- icon -->

	<link rel="icon" href="<?= base_url() ?>assets/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url() ?>assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#fff">
	<meta name="theme-color" content="#343a40">
	<meta name="msapplication-TileImage" content="<?= base_url() ?>assets/favicon/icon-144x144.png">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

	<?php if (!empty($plugin_styles)) : ?>
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<?php foreach ($plugin_styles as $style) : ?>
			<link href="<?= $style ?>" rel="stylesheet" type="text/css" />
		<?php endforeach; ?>
		<!-- END PAGE LEVEL PLUGINS -->
	<?php endif; ?>
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">

	<style>
		.nowrap {
			white-space: nowrap;
		}

		.note-float-center {
			display: block;
			margin: 0 auto;
		}

		.note-icon-float-center:before {
			content: "\2680"
		}

		.daterangepicker .calendar-table th,
		.daterangepicker .calendar-table td {
			color: black;
		}
	</style>
</head>

<body class="<?= $page_setting ?>">
	<div class="wrapper">
		<div id="loader"></div>
		<!-- preloader -->
		<!-- <div class="preloader flex-column justify-content-center bg-dark align-items-center">
			<img class="animation__shake" src="<?= base_url('assets/favicon/') ?>ms-icon-310x310.png" alt="IDETO.co.id Logo" height="60" width="60">
		</div> -->
		<!-- Navbar -->
		<nav class="<?= $page_nav ?>" id="nav-top">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>" role="button">Dashboard</a>
				</li>
				<!-- <li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li> -->
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">

				<!-- Notifications Dropdown Menu -->
				<!-- <li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li> -->
				<li class="nav-item">
					<input type="checkbox" name="dark-mode-switch" id="dark-mode-switch" style="display: none;">
					<label class="nav-link" for="dark-mode-switch" id="dark-mode-switch-label" style="cursor: pointer;">
						<i class="far fa-moon"></i>
					</label>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<button type="button" class="btn nav-link btn-logout">
						<i class="fas fa-sign-out-alt"></i>
					</button>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url() ?>" class="brand-link">
				<img src="<?= base_url() ?>assets/favicon/android-chrome-256x256.png" alt="Kopigadjah" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">TbuBdg</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel d-flex">
					<div class="info">
						<a href="#" class="d-block text-capitalize"><?= $this->session->userdata('data')['nama'] ?></a>
						<small class="form-text text-muted"><?= $this->session->userdata('data')['level'] ?></small>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<?= $navigation ?>
			</div>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php if ($breadcrumb_show || $title_show) : ?>
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h1 class="m-0" style="font-size: 1.5rem;"><?= $title_show ? $title : '' ?></h1>
							</div><!-- /.col -->
							<?php if ($breadcrumb_show) : ?>
								<div class="col-sm-6">
									<ol class="breadcrumb float-sm-right">
										<?php if ($breadcrumb_1 !== null) : ?>
											<?php if ($breadcrumb_2 == null) : ?>
												<li class="breadcrumb-item active"><?= $breadcrumb_1 ?></li>
											<?php else : ?>
												<li class="breadcrumb-item"><a href="<?= $breadcrumb_1_url ?>"><?= $breadcrumb_1 ?></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($breadcrumb_2 !== null) : ?>
											<?php if ($breadcrumb_3 == null) : ?>
												<li class="breadcrumb-item active"><?= $breadcrumb_2 ?></li>
											<?php else : ?>
												<li class="breadcrumb-item"><a href="<?= $breadcrumb_2_url ?>"><?= $breadcrumb_2 ?></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($breadcrumb_3 !== null) : ?>
											<?php if ($breadcrumb_4 == null) : ?>
												<li class="breadcrumb-item active"><?= $breadcrumb_3 ?></li>
											<?php else : ?>
												<li class="breadcrumb-item"><a href="<?= $breadcrumb_3_url ?>"><?= $breadcrumb_3 ?></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($breadcrumb_4 !== null) : ?>
											<li class="breadcrumb-item active"><?= $breadcrumb_4 ?></li>
										<?php endif; ?>
									</ol>
								</div><!-- /.col -->
							<?php endif ?>
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
			<?php endif ?>

			<!-- Main content -->
			<div id="main-content" class="content mt-2">
				<div class="container-fluid">
					<?php if (file_exists(VIEWPATH . "templates/contents/{$content}.php")) : ?>
						<?php $this->load->view("templates/contents/{$content}.php"); ?>
					<?php endif; ?>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<!-- <div class="float-right d-none d-sm-inline">

			</div> -->
			<!-- Default to the left -->
			<?= $copyright ?>
		</footer>
		<!-- CHECK MODAL -->
		<div class="modal fade" id="ModalCheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title custom-font" id="LabelCheck"></h3>
					</div>
					<div class="modal-body" id="ContentCheck">
					</div>
					<div class="modal-footer">
						<button id="OkCheck" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Ya</button>

						<button class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Tidak</button>
					</div>
					<input type="hidden" id="idCheck" name="">
				</div>
			</div>
		</div>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>
	<!-- preloader -->
	<script src="<?= base_url('assets/template/') ?>plugins/loader/loadingoverlay.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/template/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>

	<!-- PAGE RELATED PLUGIN(S) -->
	<?php if (!empty($plugin_scripts)) : ?>
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<?php foreach ($plugin_scripts as $script) : ?>
			<script src="<?= $script ?>" type="text/javascript"></script>
		<?php endforeach; ?>
		<!-- END PAGE LEVEL PLUGINS -->
	<?php endif; ?>
	<script src="<?= $this->plugin->build_url('javascripts/api-client.js', FALSE, 'site') ?>" type="text/javascript"></script>
	<script src="<?= $this->plugin->build_url('javascripts/application.js', FALSE, 'site') ?>" type="text/javascript"></script>
	<script src="<?= $this->plugin->build_url('javascripts/dt.helper.js', FALSE, 'site') ?>" type="text/javascript"></script>

	<?php if (file_exists(VIEWPATH . "javascripts/contents/{$content}.js")) : ?>
		<script src="<?= $this->plugin->build_url("javascripts/contents/{$content}.js") ?>" type="text/javascript"></script>
	<?php endif; ?>
	<script>
		$(document).ready(function() {
			$("#loader").LoadingOverlay('progress')
			$(".btn-logout").click(function() {
				Swal.fire({
					title: 'Apakah anda yakin ingin keluar ?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes',
					inputAttributes: {
						id: "txt-note",
					},
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "<?= base_url() ?>login/logout";
					}
				})
			})

			$("#dark-mode-switch").change(function() {
				setDarkMode(this.checked)
			})

			function setDarkMode(data) {
				data = data == 'null' ? false : ((typeof(data) == 'string') ? (data == 'false' ? false : true) : data);

				if (data) {
					$("body").addClass("dark-mode")
					$("#nav-top").removeClass("navbar-white")
					$("#nav-top").addClass("navbar-dark")
					$(".preloader").addClass("bg-dark")
					$("#dark-mode-switch-label").html('<i class="far fa-sun"></i>');
				} else {
					$("body").removeClass("dark-mode")
					$("#nav-top").removeClass("navbar-dark")
					$(".preloader").removeClass("bg-dark")
					$("#nav-top").addClass("navbar-white")
					$("#dark-mode-switch-label").html('<i class="far fa-moon"></i>');
				}
				localStorage.setItem('isDarkMode', data);
				document.querySelector("#dark-mode-switch").checked = data;
			}
			setDarkMode(localStorage.getItem('isDarkMode'));
		})

		function setToast(data) {
			$(document).Toasts('create', {
				class: data.class,
				title: data.title,
				body: data.body
			})
			setTimeout(() => $("#toastsContainerTopRight").remove(), 5000);
		}
	</script>
</body>

</html>