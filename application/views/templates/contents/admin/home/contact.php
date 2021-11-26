<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">List Item Contact</h3>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt_basic" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Keterangan</th>
          <th>Kolom</th>
          <th>icon</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Contact Google maps</h3>
      <button type="submit" form="fmap" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="fmap" enctype="multipart/form-data">
      <div class="form-group">
        <label for="value">Google Maps</label>
        <textarea name="value" id="value" rows="3" class="form-control" placeholder="Google Maps"><?= $maps['value1'] ?></textarea>
      </div>
    </form>
  </div>
</div>

<!-- view foto -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="tambahModalTitle"></h5>
      </div>
      <div class="modal-body">
        <form action="" id="fmain" method="post">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Judul" required />
          </div>
          <div class="form-group">
            <label for="description">Keterangan</label>
            <textarea cols="3" rows="4" class="form-control" id="description" name="description" placeholder="Keterangan"></textarea>
          </div>
          <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" required>
          </div>
          <div class="form-group">
            <label for="column">Kolom</label>
            <input type="text" class="form-control" id="column" name="column" placeholder="Kolom Dengan format Bootstrap 5" required />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="gambar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center">Gambar</h5>
      </div>
      <div class="modal-body">
        <img src="<?= base_url() ?>\assets\images\student.png" class="img-fluid" alt="" id="img-view">
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>