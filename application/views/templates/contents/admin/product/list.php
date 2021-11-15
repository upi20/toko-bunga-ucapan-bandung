<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">List Product</h3>
      <div>
        <!-- <a href="<?= base_url() ?>admin/CalonKetua/export_pdf" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Export PDF</a>
        <a href="<?= base_url() ?>admin/CalonKetua/export_excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</a> -->
        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>admin/product/item/create"><i class="fa fa-plus"></i> Tambah</a>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt_basic_v2" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th style="max-width: 50px;">No</th>
          <th>Nama</th>
          <th>Slug</th>
          <th>Harga</th>
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