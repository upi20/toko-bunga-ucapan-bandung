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
            <input type="text" class="form-control" id="price" name="price" placeholder="Harga" required value="<?= $product['price'] ?>" />
            <small>Harga Produk Sekarang</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="old_price">Harga Lama</label>
            <input type="text" class="form-control" id="old_price" name="old_price" placeholder="Harga Lama" required value="<?= $product['old_price'] ?>" />
            <small>Harga lama yang nantinya akan di coret dan digantikan dengan harga baru. Bisa di kosongkan.</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="discount">Diskon</label>
            <input type="text" class="form-control" id="discount" name="discount" placeholder="Diskon" required value="<?= $product['discount'] ?>" />
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
      <div class="col-lg-6">
        <div class="d-flex justify-content-between align-items-center">
          <label>Kategori Produk</label>
          <button class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Tambah</button>
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

      <div class="col-lg-6">
        <div class="d-flex justify-content-between align-items-center">
          <label>Gambar Produk</label>
          <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#image_modal"><i class="fa fa-plus"></i> Tambah</button>
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

      <div class="col-lg-6">
        <div class="d-flex justify-content-between align-items-center">
          <label>Warna Produk</label>
          <button class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Tambah</button>
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

    </div>

    <div class="form-group">
      <label for="status">Status<span class="text-red">*</span></label>
      <select class="form-control" id="status" name="status" required>
        <option value="">Pilih Status</option>
        <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
        <option value="2" <?= $product['status'] == 2 ? 'selected' : '' ?>>Tidak Aktif</option>
      </select>
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

<!-- image -->
<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="image_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="image_modalTitle">Tambah Gambar</h5>
      </div>
      <div class="modal-body">
        <form action="" id="image_from" method="post">
          <div class="form-group">
            <label for="number">Nomor Urut Gambar</label>
            <input type="number" class="form-control" id="number" name="name" placeholder="Nomor Urut Gambar" required />
          </div>
          <div class="form-group">
            <label for="image_name">Nama Gambar</label>
            <input type="text" class="form-control" id="image_name" name="name" placeholder="Nama Gambar" required />
          </div>
          <div class="form-group">
            <label for="foto">Gambar</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
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

<!-- image -->
<div class="modal fade" id="image_modal_delete" tabindex="-1" role="dialog" aria-labelledby="image_modal_deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="image_modal_deleteTitle">Hapus Gambar</h5>
      </div>
      <div class="modal-body">
        <form action="" id="image_from" method="post">
          <div class="form-group">
            <label for="image_name">Nama Gambar</label>
            <input type="text" class="form-control" id="image_name" name="name" placeholder="Nama Gambar" required />
          </div>
          <div class="form-group">
            <label for="foto">Gambar</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
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