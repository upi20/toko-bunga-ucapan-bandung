  <!-- Header Area End Here -->
  <!-- Slider/Intro Section Start -->
  <div class="intro11-slider-wrap section-2">
    <div class="intro11-slider swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ($sliders as $slider) : ?>
          <div class="intro11-section swiper-slide slide-bg-1 bg-position" style="background-image: url('<?= base_url("files/home/slider/{$slider['foto']}") ?>');">
            <!-- Intro Content Start -->
            <div class="intro11-content-2 text-center">
              <h1 class="different-title"><?= $slider['title'] ?></h1>
              <h2 class="title text-white"><?= $slider['subtitle'] ?></h2>
              <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn flosun-button  secondary-btn theme-color rounded-0">Pesan Sekarang</a>
            </div>
            <!-- Intro Content End -->
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Slider Navigation -->
      <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
      <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
      <!-- Slider pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!-- Slider/Intro Section End -->

  <!-- keunggulan -->
  <div class="categories-area pt-40 bg-light py-3">
    <div class="container">
      <div class="row">
        <?php foreach ($excesses as $excesse) : ?>
          <div class="col-lg-4 col-sm-6">
            <div class="single-shipping">
              <div class="shipping-icon">
                <img src="<?= base_url("files/home/excess/{$excesse['foto']}") ?>" alt="<?= $excesse['title'] ?>">
              </div>
              <div class="shipping-content">
                <h5 class="title"><?= $excesse['title'] ?></h5>
                <p><?= $excesse['description'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!--Product Area Start-->
  <div class="product-area mt-text-2 py-5">
    <div class="container custom-area-2 overflow-hidden">
      <div class="row">
        <!--Section Title Start-->
        <div class="col-12 col-custom">
          <div class="section-title text-center mb-30">
            <span class="section-title-1"><?= $product_head['value1'] ?></span>
            <h3 class="section-title-3"><?= $product_head['value2'] ?></h3>
          </div>
        </div>
        <!--Section Title End-->
      </div>
      <div class="row product-row">
        <div class="col-12 col-custom">
          <div class="product-slider swiper-container anime-element-multi">
            <div class="swiper-wrapper">
              <?php for ($i = 0; $i < count($products); $i += 2) :
                $product1 = $products[$i];
                $product2 = isset($products[$i + 1]) ? $products[$i + 1] : null;
              ?>
                <div class="single-item swiper-slide">
                  <div class="single-product position-relative mb-30">
                    <div class="product-image">
                      <?php if (
                        $product1['discount'] != '' &&
                        $product1['discount'] != null &&
                        $product1['discount'] != '0'
                      ) :  ?>
                        <span class="onsale"><?= $product1['discount']; ?>%</span>
                      <?php endif ?>
                      <a class="d-block" href="<?= base_url("produk/detail/{$product1['slug']}") ?>">
                        <img src="<?= base_url("files/product/pictures/{$product1['foto1']}") ?>" alt="<?= $product1['name']; ?>" class="product-image-1 w-100">
                        <?php if ($product1['foto2']) : ?>
                          <img src="<?= base_url("files/product/pictures/{$product1['foto2']}") ?>" alt="<?= $product1['name']; ?>" class="product-image-2 position-absolute w-100">
                        <?php endif; ?>
                      </a>
                    </div>
                    <div class="product-content">
                      <div class="product-title">
                        <h4 class="title-2"> <a href="<?= base_url("produk/detail/{$product1['slug']}") ?>"><?= $product1['name']; ?></a></h4>
                      </div>
                      <div class="">
                        <span class="regular-price rupiah" style="font-weight: bold;"><?= $product1['price']; ?></span>
                        <?php if (
                          $product1['old_price'] != '' &&
                          $product1['old_price'] != null &&
                          $product1['old_price'] != '0'
                        ) :  ?>
                          <span class="old-price" style="margin-left: 8px;"><del class="rupiah"><?= $product1['old_price']; ?></del></span>
                        <?php endif ?>
                      </div>
                      <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn flosun-button secondary-btn theme-color rounded-0 mt-3">Pesan Sekarang</a>
                    </div>
                  </div>
                  <?php if ($product2 != null) : ?>
                    <div class="single-product position-relative mb-30">
                      <div class="product-image">
                        <?php if (
                          $product2['discount'] != '' &&
                          $product2['discount'] != null &&
                          $product2['discount'] != '0'
                        ) :  ?>
                          <span class="onsale"><?= $product2['discount']; ?>%</span>
                        <?php endif ?>
                        <a class="d-block" href="<?= base_url("produk/detail/{$product2['slug']}") ?>">
                          <img src="<?= base_url("files/product/pictures/{$product2['foto1']}") ?>" alt="<?= $product2['name']; ?>" class="product-image-1 w-100">
                          <?php if ($product2['foto2']) : ?>
                            <img src="<?= base_url("files/product/pictures/{$product2['foto2']}") ?>" alt="<?= $product2['name']; ?>" class="product-image-2 position-absolute w-100">
                          <?php endif; ?></a>
                      </div>
                      <div class="product-content">
                        <div class="product-title">
                          <h4 class="title-2"> <a href="<?= base_url("produk/detail/{$product2['slug']}") ?>"><?= $product2['name']; ?></a></h4>
                        </div>
                        <div class="">
                          <span class="regular-price rupiah" style="font-weight: bold;"><?= $product2['price']; ?></span>
                          <?php if (
                            $product2['old_price'] != '' &&
                            $product2['old_price'] != null &&
                            $product2['old_price'] != '0'
                          ) :  ?>
                            <span class="old-price" style="margin-left: 8px;"><del class="rupiah"><?= $product2['old_price']; ?></del></span>
                          <?php endif ?>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn flosun-button secondary-btn theme-color rounded-0 mt-3">Pesan Sekarang</a>
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              <?php endfor; ?>
            </div>
            <!-- Slider pagination -->
            <div class="swiper-pagination default-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="product-countdown-area product-countdown-style pb-text-4">
    <div class="container">
      <div class="row">
        <!--Section Title Start-->
        <div class="col-12 mb-1">
          <div class="section-title text-center mb-30 mb-1">
            <span class="section-title-1"><?= $offer_head['value1'] ?></span>
            <h3 class="section-title-3" style="padding-bottom: 0;"><?= $offer_head['value2'] ?></h3>
          </div>
        </div>
        <!--Section Title End-->
      </div>
      <div class="row">
        <div class="col-lg-8 ms-auto me-auto">
          <div class="history-area-content pb-0 mb-0 border-0">
            <?= $offer_body['value1'] ?>
            <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn flosun-button  secondary-btn theme-color rounded-0 mt-3">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="testimonial-area mt-text-2 py-5">
    <div class="container custom-area">
      <div class="row">
        <!--Section Title Start-->
        <div class="col-12 col-custom">
          <div class="section-title text-center">
            <span class="section-title-1"><?= $testimoni_head['value1'] ?></span>
            <h3 class="section-title-3"><?= $testimoni_head['value2'] ?></h3>
          </div>
        </div>
        <!--Section Title End-->
      </div>
      <div class="row">
        <div class="testimonial-carousel swiper-container intro11-carousel-wrap col-12 col-custom">
          <div class="swiper-wrapper">
            <?php foreach ($testimoni_body as $testimoni) : ?>
              <div class="single-item swiper-slide">
                <!--Single Testimonial Start-->
                <div class="single-testimonial text-center">
                  <div class="testimonial-img">
                    <img src="<?= base_url("files/home/testimoni/{$testimoni['foto']}") ?>" alt="">
                  </div>
                  <div class="testimonial-content">
                    <p><?= $testimoni['description']; ?></p>
                    <div class="testimonial-author">
                      <h6><?= $testimoni['name']; ?> <span><?= $testimoni['position']; ?></span></h6>
                    </div>
                  </div>
                </div>
                <!--Single Testimonial End-->
              </div>
            <?php endforeach; ?>

          </div>
          <!-- Slider Navigation -->
          <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i>
          </div>
          <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
          <!-- Slider pagination -->
          <div class="swiper-pagination default-pagination"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="our-history-area pt-text-3 bg-light py-5">
    <div class="container">
      <div class="row">
        <!--Section Title Start-->
        <div class="col-12 mb-0">
          <div class="section-title text-center mb-30 mb-0">
            <span class="section-title-1"><?= $offer_head2['value1'] ?></span>
            <h3 class="section-title-3"><?= $offer_head2['value2'] ?></h3>
          </div>
        </div>
        <!--Section Title End-->
      </div>
      <div class="row">
        <div class="col-lg-8 ms-auto me-auto">
          <div class="history-area-content pb-0 mb-0 border-0 text-center">
            <?= $offer_body2['value1'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>