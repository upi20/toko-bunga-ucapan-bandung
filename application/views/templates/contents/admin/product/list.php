<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">List Product</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" id="fhead">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="head_value1">Judul Di Halaman Utama</label>
            <input type="text" class="form-control" id="head_value1" name="head_value1" placeholder="Judul" value="<?= $head['value1'] ?>" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="head_value2">Sub Judul Di Halaman Utama</label>
            <input type="text" class="form-control" id="head_value2" name="head_value2" placeholder="Sub Judul" value="<?= $head['value2'] ?>" />
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="form-group mb-lg-0">
            <label for="head2_value1">Judul Di Halaman Produk</label>
            <input type="text" class="form-control" id="head2_value1" name="head2_value1" placeholder="Judul" value="<?= $head2['value1'] ?>" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group mb-lg-0">
            <label for="head2_value2">Sub Judul Di Halaman Produk</label>
            <input type="text" class="form-control" id="head2_value2" name="head2_value2" placeholder="Sub Judul" value="<?= $head2['value2'] ?>" />
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-between align-items-end">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
    <hr>
    <div class="d-flex justify-content-between align-items-center my-2">
      <label for="dt_basic">List Data</label>
      <a class="btn btn-primary btn-xs" href="<?= base_url() ?>admin/product/item/create"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <table id="dt_basic_v2" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th style="max-width: 50px;">No</th>
          <th>Nama</th>
          <th>Slug</th>
          <th>Harga</th>
          <th style="max-width: 150px;">Tampilkan di home</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Hapus Produk</h5>
      </div>
      <div class="modal-body">
        <form action="" id="fdelete">
          <input type="hidden" name="id" id="delete-id">
          <p>Apakah anda yakin akan menghapus Produk ini..?</p>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger btn-ef btn-ef-3 btn-ef-3c" form="fdelete"><i class="fa fa-check"></i> Hapus</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>