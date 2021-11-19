<div class="breadcrumbs-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="breadcrumb-content position-relative section-content pt-5">
          <h3 class="title-3">Daftar Produk</h3>
          <ul>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><?= $title_head ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="shop-main-area mb-5">
  <div class="container container-default custom-area">
    <div class="row flex-row-reverse">
      <div class="col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        <div class="shop_toolbar_wrapper mb-30">
          <div class="shop_toolbar_btn">
            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid-4"><i class="fa fa-th"></i></button>
            <button data-role="grid_3" type="button" class="btn-grid-3" title="Grid-3"> <i class="fa fa-th-large"></i></button>
            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
          </div>
          <div class="shop-select">
            <form class="d-flex flex-column w-100" action="">
              <input type="hidden" name="<?= $form['name'] ?>" value="<?= $form['value'] ?>">
              <div class="form-group">
                <select class="form-control nice-select w-100" name="sort" onchange="this.form.submit()">
                  <?php foreach ($sort_list as $s) : ?>
                    <option <?= ($sort == $s['id']) ? 'selected' : ''  ?> value="<?= $s['id'] ?>"><?= $s['text'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </form>
          </div>
        </div>
        <!--shop toolbar end-->
        <!-- Shop Wrapper Start -->
        <div class="row shop_wrapper grid_4">
          <?php foreach ($products as $product) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6  col-custom product-area">
              <div class="product-item">
                <div class="single-product position-relative mr-0 ml-0">
                  <div class="product-image">
                    <a class="d-block" href="product-details.html">
                      <img src="<?= base_url("files/product/pictures/{$product['foto1']}") ?>" alt="<?= $product['name']; ?>" class="product-image-1 w-100">
                      <?php if ($product['foto2']) : ?>
                        <img src="<?= base_url("files/product/pictures/{$product['foto2']}") ?>" alt="<?= $product['name']; ?>" class="product-image-2 position-absolute w-100">
                      <?php endif; ?>
                    </a>
                    <?php if (
                      $product['discount'] != '' &&
                      $product['discount'] != null &&
                      $product['discount'] != '0'
                    ) :  ?>
                      <span class="onsale"><?= $product['discount']; ?>%</span>
                    <?php endif ?>
                  </div>
                  <div class="product-content">
                    <div class="product-title">
                      <h4 class="title-2"> <a href="<?= base_url("produk/detail/{$product['slug']}") ?>"><?= $product['name']; ?></a></h4>
                    </div>
                    <div class="">
                      <span class="regular-price rupiah" style="font-weight: bold;"><?= $product['price']; ?></span>
                      <?php if (
                        $product['old_price'] != '' &&
                        $product['old_price'] != null &&
                        $product['old_price'] != '0'
                      ) :  ?>
                        <span class="old-price" style="margin-left: 8px;"><del class="rupiah"><?= $product['old_price']; ?></del></span>
                      <?php endif ?>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn flosun-button secondary-btn theme-color rounded-0 mt-3">Pesan Sekarang</a>
                  </div>
                  <div class="product-content-listview">
                    <div class="product-title">
                      <h4 class="title-2"><a href="<?= base_url("produk/detail/{$product['slug']}") ?>"><?= $product['name']; ?></a></h4>
                    </div>
                    <div class="price-box">
                      <span class="regular-price rupiah" style="font-weight: bold;"><?= $product['price']; ?></span>
                      <?php if (
                        $product['old_price'] != '' &&
                        $product['old_price'] != null &&
                        $product['old_price'] != '0'
                      ) :  ?>
                        <span class="old-price" style="margin-left: 8px;"><del class="rupiah"><?= $product['old_price']; ?></del></span>
                      <?php endif ?>
                    </div>
                    <p class="desc-content"><?= $product['excerpt']; ?></p>
                    <div class="button-listview">
                      <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Pesan Sekarang">
                        <span>Pesan Sekarang</span> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>