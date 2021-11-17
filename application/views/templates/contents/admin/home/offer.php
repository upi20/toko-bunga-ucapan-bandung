<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Penawaran Halaman Depan</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="fmain" enctype="multipart/form-data">
      <div class="form-group">
        <label for="head_value1">Judul</label>
        <input type="text" class="form-control" id="head_value1" name="head_value1" placeholder="Judul" value="<?= $head['value1'] ?>" />
      </div>

      <div class="form-group">
        <label for="head_value2">Sub Judul</label>
        <input type="text" class="form-control" id="head_value2" name="head_value2" placeholder="Sub Judul" value="<?= $head['value2'] ?>" />
      </div>

      <div class="form-group">
        <label for="body_value1">Deskripsi</label>
        <textarea name="body_value1" id="body_value1" rows="3" class="form-control summernote" placeholder="Deskripsi"><?= $body['value1'] ?></textarea>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>

<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Penawaran Halaman Depan Bawah</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="fmain2" enctype="multipart/form-data">
      <div class="form-group">
        <label for="head_value1">Judul</label>
        <input type="text" class="form-control" name="head_value1" placeholder="Judul" value="<?= $head2['value1'] ?>" />
      </div>

      <div class="form-group">
        <label for="head_value2">Sub Judul</label>
        <input type="text" class="form-control" name="head_value2" placeholder="Sub Judul" value="<?= $head2['value2'] ?>" />
      </div>

      <div class="form-group">
        <label for="body_value1">Deskripsi</label>
        <textarea name="body_value1" rows="3" class="form-control summernote" placeholder="Deskripsi"><?= $body2['value1'] ?></textarea>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain2"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>