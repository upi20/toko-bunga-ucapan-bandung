<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Data Produk</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="main-form" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id" value="<?= $getID; ?>">
      <input type="hidden" name="is-ubah" id="is-ubah" value="<?= $isUbah ? 1 : 0; ?>">
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Nama Produk<span class="text-red">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required value="<?= $product['name'] ?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="slug">Slug<span class="text-red">*</span></label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Untuk url" required value="<?= $product['slug'] ?>" />
            <small>Slug digunakan untuk akses produk lewat url atau alamt web, slug diatas tidak boleh sama dengan slug dari produk yang lain.</small>
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <label for="excerpt">Kutipan</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="form-control" placeholder="Kutipan detail produk, atau ringkasan deskripsi produk"><?= $product['excerpt'] ?></textarea>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="price">Harga<span class="text-red">*</span></label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Harga" required value="<?= $product['price'] ?>" />
            <small>Harga Produk Sekarang</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="old_price">Harga Lama</label>
            <input type="number" class="form-control" id="old_price" name="old_price" placeholder="Harga Lama" value="<?= $product['old_price'] ?>" />
            <small>Harga lama yang nantinya akan di coret dan digantikan dengan harga baru. Bisa di kosongkan.</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="discount">Diskon</label>
            <input type="number" class="form-control" id="discount" name="discount" placeholder="Diskon" value="<?= $product['discount'] ?>" />
            <small>Diskon akan ditampilkan di sisi kanan atas dari gambar produk, bisa di kosongkan jika tidak ada diskon.</small>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="description">Deskripsi Produk</label>
        <textarea name="description" id="description" rows="3" class="form-control summernote" placeholder="Deskripsi Produk"><?= $product['description'] ?></textarea>
      </div>

      <div class="form-group">
        <label for="size">Ukuran Produk</label>
        <textarea name="size" id="size" rows="3" class="form-control summernote" placeholder="Ukuran"><?= $product['size'] ?></textarea>
      </div>
    </form>
    <div class="row">
      <!-- category -->
      <div class="col-lg-6 my-2">
        <div class="d-flex justify-content-between align-items-center">
          <label>Kategori Produk</label>
          <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#category_modal"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <table id="table_category" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th style="max-width: 30px;">No</th>
              <th>Nama</th>
              <th style="max-width: 50px;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>

      <!-- images -->
      <div class="col-lg-6 my-2">
        <div class="d-flex justify-content-between align-items-center">
          <label>Gambar Produk</label>
          <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#image_modal" id="image_btn_tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <table id="table_image" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th style="max-width: 70px;">No. urut</th>
              <th>Nama</th>
              <th style="max-width: 80px;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>

      <!-- color -->
      <div class="col-lg-6 my-2">
        <div class="d-flex justify-content-between align-items-center">
          <label>Warna Produk</label>
          <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#color_modal"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <table id="table_color" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th style="max-width: 30px;">No</th>
              <th>Nama</th>
              <th style="max-width: 50px;">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="status">Status<span class="text-red">*</span></label>
          <select class="form-control" id="status" name="status" required form="main-form">
            <option value="">Pilih Status</option>
            <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
            <option value="2" <?= $product['status'] == 2 ? 'selected' : '' ?>>Tidak Aktif</option>
          </select>
        </div>
        <div class="form-group">
          <input type="checkbox" id="view_review" name="view_review" title="Tampilkan di halaman utama" <?= $product['view_review'] == 1 ? 'checked' : ''; ?> form="main-form" />
          <label for="view_review">Tampilkan review produk</label>
        </div>
        <div class="form-group">
          <input type="checkbox" id="view_home" name="view_home" title="Tampilkan di halaman utama" <?= $product['view_home'] == 1 ? 'checked' : ''; ?> form="main-form" />
          <label for="view_home">Tampilkan di halaman utama</label>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer text-right">
    <button type="submit" form="main-form" class="btn btn-primary">
      <i class="fa fa-save"></i> Simpan
    </button>
    <a class="btn btn-danger" href="<?= base_url() ?>/admin/product/item"><i class="fa fa-save"></i> Kembali</a>
  </div>
</div>
<script>
  global_id_user = "<?= $product['id_user'] ?? 0 ?>";
</script>

<!-- lihat gambar -->
<div class="modal fade" id="fot_preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="fmembership_active" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lihat Gambar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" class="img-fluid" alt="" id="foto-preview">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Tutup
          </button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div>
</div>

<!-- image add -->
<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="image_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="image_modalTitle">Tambah Gambar</h5>
      </div>
      <div class="modal-body">
        <form action="" id="image_from" method="post">
          <div class="form-group">
            <label for="image_number">Nomor Urut Gambar</label>
            <input type="number" class="form-control" id="image_number" name="number" placeholder="Nomor Urut Gambar" required />
            <input type="hidden" id="image_id" name="id" />
            <input type="hidden" id="image_temp" name="temp_foto" />
          </div>
          <div class="form-group">
            <label for="image_name">Nama Gambar</label>
            <input type="text" class="form-control" id="image_name" name="name" placeholder="Nama Gambar" required />
          </div>
          <div class="form-group">
            <label for="image_foto">Gambar</label>
            <input type="file" class="form-control-file" id="image_foto" name="foto" accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="image_from"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<!-- image delete -->
<div class="modal fade" id="image_modal_delete" tabindex="-1" role="dialog" aria-labelledby="image_modal_deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="image_modal_deleteTitle">Hapus Gambar</h5>
      </div>
      <div class="modal-body">
        <form action="" id="image_delete_from" method="post">
          <input type="hidden" id="image_detail_id" name="detail_id" />
          <input type="hidden" id="image_delete" name="images" />
          <p>Apakah anda yakin akan menghapus gambar ini..?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="image_delete_from"><i class="fa fa-save"></i> Hapus</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<!-- categories -->
<div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="category_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="category_modalTitle">Tambah Kategori</h5>
      </div>
      <div class="modal-body">
        <form action="" id="category_from" method="post">
          <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control">
              <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id']; ?>"><?= $category['text']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="category_from"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<!-- category delete -->
<div class="modal fade" id="category_modal_delete" tabindex="-1" role="dialog" aria-labelledby="category_modal_deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="category_modal_deleteTitle">Hapus Kategori</h5>
      </div>
      <div class="modal-body">
        <form action="" id="category_delete_from" method="post">
          <input type="hidden" id="category_detail_id" name="detail_id" />
          <p>Apakah anda yakin akan menghapus kategori ini..?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="category_delete_from"><i class="fa fa-save"></i> Hapus</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<!-- colors -->
<div class="modal fade" id="color_modal" tabindex="-1" role="dialog" aria-labelledby="color_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="color_modalTitle">Tambah Warna</h5>
      </div>
      <div class="modal-body">
        <form action="" id="color_from" method="post">
          <div class="form-group">
            <label for="color_id">Warna</label>
            <select name="color_id" id="color_id" class="form-control">
              <?php foreach ($colors as $color) : ?>
                <option value="<?= $color['id']; ?>"><?= $color['text']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="color_from"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<!-- color delete -->
<div class="modal fade" id="color_modal_delete" tabindex="-1" role="dialog" aria-labelledby="color_modal_deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="color_modal_deleteTitle">Hapus Warna</h5>
      </div>
      <div class="modal-body">
        <form action="" id="color_delete_from" method="post">
          <input type="hidden" id="color_detail_id" name="detail_id" />
          <p>Apakah anda yakin akan menghapus warna ini..?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="color_delete_from"><i class="fa fa-save"></i> Hapus</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>