<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | <?= $app_name ?></title>

    <!-- icon -->
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
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/favicon/ms-icon-144x144.png">

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

</head>

<body class="hold-transition register-page  my-5">
    <div class="register-box">
        <div class="register-logo" style="line-height:.5">
            <img src="<?= base_url() ?>assets/favicon/android-chrome-256x256.png" class="rounded mx-auto d-block" style="max-width: 100px;" alt="Logo SIKK">
            <span class="h5">Sekolah Indonesia Kota Kinabalu<br>Learning Management System</span>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg"><?= $title ?></p>
                <?php if (file_exists(VIEWPATH . "templates/contents/{$content}.php")) : ?>
                    <?php $this->load->view("templates/contents/{$content}.php"); ?>
                <?php endif; ?>
                <a href="/login" class="text-center">Saya sudah mempunyai akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <small class="form-text text-muted">© 2021 Developed by <a href="https://infinit.id/">CV. Adikarya Infinit</a></small>

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>
    <!-- loader -->
    <script src="<?= base_url('assets/template/') ?>plugins/loader/loadingoverlay.min.js"></script>
    <!-- PAGE RELATED PLUGIN(S) -->
    <?php if (!empty($plugin_scripts)) : ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php foreach ($plugin_scripts as $script) : ?>
            <script src="<?= $script ?>" type="text/javascript"></script>
        <?php endforeach; ?>
        <!-- END PAGE LEVEL PLUGINS -->
    <?php endif; ?>
    <?php if (file_exists(VIEWPATH . "javascripts/contents/{$content}.js")) : ?>
        <script src="<?= $this->plugin->build_url("javascripts/contents/{$content}.js") ?>" type="text/javascript"></script>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $("#loader").LoadingOverlay('progress')
        })
    </script>
</body>

</html>