<!-- Header Area End Here -->
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="breadcrumb-content position-relative section-content pt-5">
          <h3 class="title-3">Detail Produk</h3>
          <ul>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Detail Produk</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if ($view_product) : ?>
  <div class="single-product-main-area">
    <div class="container container-default custom-area">
      <div class="row">
        <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
          <div class="product-details-img">
            <div class="single-product-img swiper-container gallery-top popup-gallery">
              <div class="swiper-wrapper">
                <?php foreach ($data->images as $image) : ?>
                  <div class="swiper-slide">
                    <a class="w-100" href="<?= base_url("files/product/pictures/{$image->foto}") ?>">
                      <img class="w-100" src="<?= base_url("files/product/pictures/{$image->foto}") ?>" alt="<?= $image->name ?>">
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="single-product-thumb swiper-container gallery-thumbs">
              <div class="swiper-wrapper">
                <?php foreach ($data->images as $image) : ?>
                  <div class="swiper-slide">
                    <img src="<?= base_url("files/product/pictures/{$image->foto}") ?>" alt="<?= $image->name ?>">
                  </div>
                <?php endforeach; ?>
              </div>
              <!-- Add Arrows -->
              <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i>
              </div>
              <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-custom">
          <div class="product-summery position-relative">
            <div class="product-head mb-3">
              <h2 class="product-title"><?= $data->product->name ?></h2>
            </div>
            <div class="price-box mb-2">
              <span class="regular-price rupiah"><?= $data->product->price ?></span>
              <?php if (
                $data->product->old_price != '' &&
                $data->product->old_price != null &&
                $data->product->old_price != '0'
              ) :  ?>
                <span class="old-price"><del class="rupiah"><?= $data->product->old_price ?></del></span>
              <?php endif ?>
              <?php if (
                $data->product->discount != '' &&
                $data->product->discount != null &&
                $data->product->discount != '0'
              ) :  ?>
                <span class="regular-price"><?= $data->product->discount ?>%</span>
              <?php endif ?>
            </div>

            <p class="desc-content mb-2"><?= $data->product->excerpt ?></p>
            <div class="social-share">
              <span>Kategori :</span>
              <?php foreach ($data->categories as $category) : ?>
                <a href="<?= base_url("produk?category={$category->slug}") ?>" class="title-2"><?= $category->name ?></a> |
              <?php endforeach; ?>
            </div>
            <div class="social-share mb-2">
              <span>Warna :</span>
              <?php foreach ($data->colors as $color) : ?>
                <a href="<?= base_url("produk?color={$color->slug}") ?>" class="title-2"><?= $color->name ?></a> |
              <?php endforeach; ?>
            </div>
            <div class="quantity-with_btn mb-5">
              <div class="add-to_cart">
                <a class="btn product-cart button-icon flosun-button dark-btn" href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>">Pesan Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-no-text">
        <div class="col-lg-12 col-custom">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Deskripsi Produk</a>
            </li>
            <?php if ($data->product->view_review == 1) : ?>
              <li class="nav-item">
                <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link text-uppercase" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Ukuran Produk</a>
            </li>
          </ul>
          <div class="tab-content mb-text" id="myTabContent">
            <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
              <div class="desc-content">
                <?= $data->product->description; ?>
              </div>
            </div>
            <?php if ($data->product->view_review == 1) : ?>

              <!-- review -->
              <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Start Single Content -->
                <div class="product_tab_content  border p-3">
                  <div class="review_address_inner" id="review_container">
                  </div>
                  <!-- Start RAting Area -->
                  <div class="rating_wrap">
                    <h5 class="rating-title-1 font-weight-bold mb-2">Berikan komentar anda anda </h5>
                    <p class="mb-2">Email anda tidak akan dipulikasikan. kolom wajib di isi*</p>
                  </div>
                  <!-- End RAting Area -->
                  <div id="alert_area">

                  </div>
                  <div class="comments-area comments-reply-area">
                    <div class="row">
                      <div class="col-lg-12 col-custom">
                        <form action="#" id="freview" class="comment-form-area">
                          <input type="hidden" name="slug" value="<?= $slug ?>" id="slug">
                          <div class="row comment-input">
                            <div class="col-md-6 col-custom comment-form-author mb-3">
                              <label>Nama <span class="required">*</span></label>
                              <input type="text" required="required" name="name" id="name">
                            </div>
                            <div class="col-md-6 col-custom comment-form-emai mb-3">
                              <label>Email <span class="required">*</span></label>
                              <input type="email" required="required" name="email" id="email">
                            </div>
                          </div>
                          <div class="comment-form-comment mb-3">
                            <label>Komentar <span class="required">*</span></label>
                            <textarea class="comment-notes" required="required" name="description" id="description"></textarea>
                          </div>
                          <div class="comment-form-submit">
                            <button class="btn flosun-button secondary-btn rounded-0" type="submit" id="btn-submit">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Single Content -->
              </div>
            <?php endif; ?>
            <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
              <div class="size-tab table-responsive-lg">
                <?= $data->product->size; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="product-area mt-text-3 my-5">
  <div class="container custom-area-2 overflow-hidden">
    <div class="row">
      <!--Section Title Start-->
      <div class="col-12 col-custom">
        <div class="section-title text-center mb-30">
          <span class="section-title-1"><?= $title_recent['value1'] ?></span>
          <h3 class="section-title-3"><?= $title_recent['value2'] ?></h3>
        </div>
      </div>
      <!--Section Title End-->
    </div>
    <div class="row product-row">
      <div class="col-12 col-custom">
        <div class="product-slider swiper-container anime-element-multi">
          <div class="swiper-wrapper">
            <?php for ($i = 0; $i < count($recent); $i += 2) :
              $product1 = $recent[$i];
              $product2 = isset($recent[$i + 1]) ? $recent[$i + 1] : null;
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
              </div>
              <?php if ($product2 != null) : ?>
                <div class="single-item swiper-slide">
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
                </div>
              <?php endif ?>
            <?php endfor; ?>
          </div>
          <!-- Slider pagination -->
          <div class="swiper-pagination default-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  const review = '<?= $data->product->view_review ?>';
</script>