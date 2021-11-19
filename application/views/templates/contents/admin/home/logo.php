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
          <input type="hidden" name="temp_logo1" value="<?= $logo['value1'] ?>">
          <input type="hidden" name="temp_logo2" value="<?= $logo['value2'] ?>">
          <div class="form-group">
            <label for="logo1">Logo Atas
              <?php if ($logo['value1']) : ?>
                <a href="#" data-foto="<?= $logo['value1'] ?>" onclick="view_gambar(this)">Lihat</a>
              <?php endif ?>
            </label>
            <input type="file" class="form-control" id="logo1" name="logo1" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="logo2">Logo Bawah
              <?php if ($logo['value2']) : ?>
                <a href="#" data-foto="<?= $logo['value2'] ?>" onclick="view_gambar(this)">Lihat</a>
              <?php endif ?>
            </label>
            <input type="file" class="form-control" id="logo2" name="logo2" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="footer_descritpion">Deskripsi Di Bawah Halaman</label>
        <textarea name="footer_descritpion" id="footer_descritpion" rows="3" class="form-control" placeholder="Deskripsi"><?= $footer_descritpion['value1'] ?></textarea>
      </div>
    </form>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain"><i class="fa fa-save"></i> Simpan</button>
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