<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Data Calon Ketua</h3>
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
            <label for="npm">Nomor Pokok Pengurus</label>
            <input type="text" class="form-control" id="npm" name="npm" placeholder="Nomor Pokok Pengurus" required value="<?= $profile['npm'] ?>" />
          </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?= $profile['nama'] ?>" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="photo">Photo <?= $profile['photo'] != null ? "
            <a href=\"#\"
            data-src=\"{$profile['photo']}\"
            data-alt=\"{$profile['nama']}\"
            onclick=\"photo_preview(this)\">
            Lihat </a>" : '' ?></label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo" ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="no_urut">Nomor Urut</label>
            <input type="number" class="form-control" id="no_urut" name="no_urut" placeholder="Nomor Urut" required value="<?= $profile['no_urut'] ?>" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="visi">Visi</label>
        <textarea name="visi" id="visi" rows="3" class="form-control summernote" placeholder="Visi Calon Ketua"><?= $profile['visi'] ?></textarea>
      </div>

      <div class="form-group">
        <label for="misi">Misi</label>
        <textarea name="misi" id="misi" rows="3" class="form-control summernote" placeholder="Misi Calon Ketua"><?= $profile['misi'] ?></textarea>
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
          <option value="">Pilih Status</option>
          <option value="1" <?= $profile['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
          <option value="2" <?= $profile['status'] == 2 ? 'selected' : '' ?>>Tidak Aktif</option>
        </select>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
  <div class="card-footer text-right">
    <button type="submit" form="main-form" class="btn btn-primary">
      Save
    </button>
    <a class="btn btn-danger" href="<?= base_url() ?>admin/CalonKetua">Back</a>
  </div>
</div>
<script>
  global_id_user = "<?= $profile['id_user'] ?? 0 ?>";
</script>

<!-- membership_active -->
<div class="modal fade" id="fot_preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="fmembership_active" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lihat foto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" class="img-fluid" alt="" id="foto-preview">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            Submit
          </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div>
</div>