<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Logo</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="fmain" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <input type="hidden" name="temp_logo1" value="<?= $about_foto['value1'] ?>">
          <div class="form-group">
            <label for="logo1">Logo
              <?php if ($about_foto['value1']) : ?>
                <a href="#" data-foto="<?= $about_foto['value1'] ?>" onclick="view_gambar(this)">Lihat</a>
              <?php endif ?>
            </label>
            <input type="file" class="form-control" id="logo1" name="logo1" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="about_title">Judul</label>
            <input type="text" class="form-control" id="about_title" name="about_title" placeholder="Judul" required value="<?= $about['value1'] ?>" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="about_description">Deskripsi</label>
        <textarea name="about_description" id="about_description" rows="3" class="form-control summernote" placeholder="Deskripsi"><?= $about['value2'] ?></textarea>
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
      <h3 class="card-title">Sejarah</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="fhistory" enctype="multipart/form-data">
      <div class="form-group">
        <label for="history_title">Judul</label>
        <input type="text" class="form-control" id="history_title" name="history_title" placeholder="Judul" required value="<?= $about_history['value1'] ?>" />
      </div>
      <div class="form-group">
        <label for="history_description">Deskripsi</label>
        <textarea name="history_description" id="history_description" rows="3" class="form-control summernote" placeholder="Deskripsi"><?= $about_history['value2'] ?></textarea>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fhistory"><i class="fa fa-save"></i> Simpan</button>
  </div>
</div>

<div class="modal fade" id="gambar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center">Gambar</h5>
      </div>
      <div class="modal-body">
        <img src="" class="img-fluid" alt="" id="img-view">
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>