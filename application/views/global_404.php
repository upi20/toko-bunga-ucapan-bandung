<!DOCTYPE html>
<html lang="id-id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404 | SIKK Learning</title>
    <!-- <meta name="author" content="pkfrom" />
    <meta name="keywords" content="404 page, css3, template, html5 template" />
    <meta name="description" content="404 - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> -->

    <!-- Libs CSS -->
    <link type="text/css" media="all" href="<?= base_url() ?>assets/404/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" media="all" href="<?= base_url() ?>assets/404/assets/css/404.min.css" rel="stylesheet" />

    <!-- Favicons -->
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
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Load page -->
    <div class="animationload">
        <div class="loader">
        </div>
    </div>
    <!-- End load page -->

    <!-- Content Wrapper -->
    <div id="wrapper">
        <div class="container">
            <!-- Switcher -->
            <div class="switcher">
                <input id="sw" type="checkbox" class="switcher-value">
                <label for="sw" class="sw_btn"></label>
                <div class="bg"></div>
                <div class="text">Turn <span class="text-l">off</span><span class="text-d">on</span><br />the light</div>
            </div>
            <!-- End Switcher -->

            <!-- Dark version -->
            <div id="dark" class="row text-center">
                <div class="info">
                    <img src="<?= base_url() ?>assets/404/assets/img/404-dark.png" alt="404 error" />
                </div>
            </div>
            <!-- End Dark version -->

            <!-- Light version -->
            <div id="light" class="row text-center">
                <!-- Info -->
                <div class="info">
                    <img src="<?= base_url() ?>assets/404/assets/img/404-light.gif" alt="404 error" />
                    <!-- end Rabbit -->
                    <p>Halaman yang Anda cari telah dipindahkan, dihapus, <br>diganti namanya, atau mungkin tidak pernah ada.</p>
                    <a href="<?= base_url() ?>" class="btn">Go Login</a>
                    <!--<a href="#" class="btn btn-brown">Contact Us</a>-->
                </div>
                <!-- end Info -->
            </div>
            <!-- End Light version -->

        </div>
        <!-- end container -->
    </div>
    <!-- end Content Wrapper -->


    <!-- Scripts -->
    <script src="<?= base_url() ?>assets/404/assets/js/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/404/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/404/assets/js/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/404/assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/404/assets/js/404.min.js" type="text/javascript"></script>
</body>

</html>