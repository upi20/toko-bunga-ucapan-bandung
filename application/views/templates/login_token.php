<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | KPU DKM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->

  <link rel="icon" href="<?= base_url() ?>assets/favicon/favicon.ico">
  <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
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
</head>

<body class="bg-white">
  <div class="container d-flex justify-content-center flex-column align-items-center" style="min-height: 100vh;">
    <img src="<?= base_url() ?>assets/images/logo2.png" alt="" style="margin-bottom: 10px;">
    <h1 style="font-size: 18px; font-weight: bold;">Selamat Datang!</h1>
    <div style="max-width: 221px;">
      <p class="text-center" style="font-size: 14px; margin-bottom: 12px;">Silahkan pilih hak suaramu sesuai dengan hati nurani</p>
    </div>
    <form action="" method="post" autocomplete="off" id="form-login">
      <input type="text" name="token" autocomplete="off" class="form-control text-center mb-3" style="padding: 14px; background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); min-width: 304px; color: #BCBCBC; font-size: 18px;
border-radius: 24px; border:0" id="token" placeholder="Silahkan masukan token">
    </form>
    <button type="submit" form="form-login" class="btn text-white" style="filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); border-radius: 64px; background-color: #00769B; padding: 13px 37px 13px 37px; font-size: 18;">Login</button>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
  <!-- loader -->
  <script src="<?= base_url('assets/template/') ?>plugins/loader/loadingoverlay.min.js"></script>
  <!-- AdminLTE Validator -->
  <script>
    const base_url = '<?= base_url() ?>';
  </script>
  <script src="<?= base_url('assets/plugins/') ?>jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url('assets/plugins/') ?>jquery-validation/additional-methods.min.js"></script>
  <?php if (file_exists(VIEWPATH . "javascripts/contents/{$content}.js")) : ?>
    <script src="<?= $this->plugin->build_url("javascripts/contents/{$content}.js") ?>" type="text/javascript"></script>
  <?php endif; ?>
</body>

</html>