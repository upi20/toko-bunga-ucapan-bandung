<!DOCTYPE html>
<html lang="id-id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | <?= $app_name ?></title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="Toko Bunga Papan Ucapan Bandung">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
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
  <meta name="theme-color" content="##E72463">
  <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/favicon/icon-144x144.png">
  <!-- CSS
	============================================ -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/vendor/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/vendor/font.awesome.min.css">
  <!-- Linear Icons CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/vendor/linearicons.min.css">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/plugins/swiper-bundle.min.css">
  <!-- Animation CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/plugins/animate.min.css">
  <!-- Jquery ui CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/plugins/jquery-ui.min.css">
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/plugins/nice-select.min.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/plugins/magnific-popup.css">

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/template/front') ?>/css/style.css">

  <style>
    .single-shipping {
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-flex;
      display: -ms-flexbox;
      display: flex;
      margin-top: 30px;
    }

    .single-shipping .shipping-icon img {
      width: 70px;
    }

    .single-shipping .shipping-content {
      -webkit-box-flex: 1;
      -webkit-flex: 1;
      -moz-flex: 1;
      -ms-flex: 1;
      flex: 1;
      padding-left: 15px;
    }

    .single-shipping .shipping-content .title {
      font-size: 14px;
      line-height: 16px;
      text-transform: capitalize;
      font-weight: 700;
      margin-bottom: 7px;
      color: #222222;
    }

    .single-shipping .shipping-content p {
      font-size: 14px;
      line-height: 18px;
      font-weight: 300;
    }
  </style>

  <?php if (!empty($plugin_styles)) : ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <?php foreach ($plugin_styles as $style) : ?>
      <link href="<?= $style ?>" rel="stylesheet" type="text/css" />
    <?php endforeach; ?>
    <!-- END PAGE LEVEL PLUGINS -->
  <?php endif; ?>
</head>


<body>

  <!-- Header Area Start Here -->
  <header class="main-header-area">
    <!-- Main Header Area Start -->
    <div class="main-header header-transparent header-sticky">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
            <div class="header-logo d-flex align-items-center">
              <a href="<?= base_url() ?>">
                <img class="img-full" src="<?= base_url("files/logo/{$front['logo']['value1']}") ?>" alt="Header Logo">
              </a>
            </div>
          </div>
          <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">

            <nav class="main-nav d-none d-lg-flex">
              <ul class="nav">
                <?= $navigation; ?>
              </ul>
            </nav>


          </div>
          <div class="col-lg-2 col-md-6 col-6 col-custom">
            <div class="header-right-area main-nav">
              <ul class="nav">
                <li class="sidemenu-wrap">
                  <a href="#"><i class="fa fa-search"></i> </a>
                  <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                    <li>
                      <form action="<?= base_url('produk') ?>">
                        <input name="search" id="search" placeholder="Search" type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form>
                    </li>
                  </ul>
                </li>
                <li class="account-menu-wrap d-none d-lg-flex">
                  <a href="#" class="off-canvas-menu-btn">
                    <i class="fa fa-bars"></i>
                  </a>
                </li>
                <li class="mobile-menu-btn d-lg-none">
                  <a class="off-canvas-btn" href="#">
                    <i class="fa fa-bars"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Header Area End -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
      <div class="off-canvas-overlay"></div>
      <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
          <i class="fa fa-times"></i>
        </div>
        <div class="off-canvas-inner">
          <div class="search-box-offcanvas">
            <form action="<?= base_url('produk') ?>">
              <input type="text" placeholder="Search product...">
              <button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- mobile menu start -->
          <div class="mobile-navigation">
            <!-- mobile menu navigation start -->
            <nav>
              <ul class="mobile-menu">
                <?= $navigation2 ?>
              </ul>
            </nav>
            <!-- mobile menu navigation end -->
          </div>
        </div>
      </div>
    </aside>
    <!-- off-canvas menu end -->
  </header>

  <div style="min-height: 30vh;">
    <?php if (file_exists(VIEWPATH . "templates/contents/{$content}.php")) : ?>
      <?php $this->load->view("templates/contents/{$content}.php"); ?>
    <?php endif; ?>
  </div>
  <!--Footer Area Start-->
  <footer class="footer-area">
    <div class="footer-widget-area">
      <div class="container container-default custom-area">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-custom">
            <div class="single-footer-widget m-0">
              <div class="footer-logo">
                <a href="<?= base_url() ?>">
                  <img src="<?= base_url("files/logo/{$front['logo']['value2']}") ?>" alt="Logo Image">
                </a>
              </div>
              <p class="desc-content"><?= $front['description']['value1'] ?></p>
              <div class="social-links">
                <ul class="d-flex">
                  <?php foreach ($front['sosmed'] as $item) : ?>
                    <li>
                      <a class="rounded-circle" href="<?= $item['link']; ?>" title="<?= $item['name']; ?>">
                        <i class="<?= $item['icon']; ?>"></i>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title"><?= $front['list_head']['value1']; ?></h2>
              <ul class="widget-list">
                <?php foreach ($front['list_item'] as $item) : ?>
                  <li><a href="<?= $item['link']; ?>"><?= $item['name']; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title"> <?= $front['contact']['value1']; ?></h2>
              <div class="widget-body">
                <?= $front['contact']['value2']; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright-area">
      <div class="container custom-area">
        <div class="row">
          <div class="col-12 text-center col-custom">
            <div class="copyright-content" id="copyright">

            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--Footer Area End-->

  <!-- Scroll to Top Start -->
  <a class="scroll-to-top" href="#">
    <i class="lnr lnr-arrow-up"></i>
  </a>
  <!-- Scroll to Top End -->

  <!-- JS
    ============================================ -->

  <!-- jQuery JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/vendor/jquery-3.6.0.min.js"></script>
  <!-- jQuery Migrate JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/vendor/jquery-migrate-3.3.2.min.js"></script>
  <!-- Modernizer JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/vendor/modernizr-3.7.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/vendor/bootstrap.bundle.min.js"></script>

  <!-- Swiper Slider JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/swiper-bundle.min.js"></script>
  <!-- nice select JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/nice-select.min.js"></script>
  <!-- Ajaxchimpt js -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/jquery.ajaxchimp.min.js"></script>
  <!-- Jquery Ui js -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/jquery-ui.min.js"></script>
  <!-- Jquery Countdown js -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/jquery.countdown.min.js"></script>
  <!-- jquery magnific popup js -->
  <script src="<?= base_url('assets/template/front') ?>/js/plugins/jquery.magnific-popup.min.js"></script>

  <!-- Main JS -->
  <script src="<?= base_url('assets/template/front') ?>/js/main.js"></script>
  <script>
    document.getElementById('copyright').innerHTML = `<p><?= $front['copyright']['value1'] ?></p>`;
  </script>
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

</body>

</html>