<div class="row">
  <div class="col-md-6">
    <?php if (isset($success)) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong> <?= $kunci == '1' ? 'Kunci Pemungutan Suara berhasil diaktifkan.' : 'Kunci Pemungutan Suara berhasil dinonaktifkan.' ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Kunci Pemungutan Suara</h3>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
          <div class="mr-3">
            <button type="button" class="btn btn-<?= $kunci == '1' ? 'primary' : 'danger' ?>" data-toggle="modal" data-target="#resetModal"><?= $kunci == '1' ? 'Buka Kunci' : 'Kunci' ?></button>
          </div>
          <div>
            <span>
              <?php if ($kunci == '1') : ?>
                <span class="text-bold text-danger">Pemungutan Suara Ditutp, Pemilih tidak bisa memberikan suaranya.</span>
              <?php elseif ($kunci == '0') : ?>
                <span class="text-bold text-success">Pemungutan Suara Dibuka, Pemilih bisa memberikan suaranya.</span>
              <?php endif; ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="resetModalTitle">Konfrimasi</h5>
      </div>
      <div class="modal-body">
        <form action="" id="fmain" method="post">
          <input type="hidden" name="kunci" value="1">
          <p>Apakah anda yakin. <br><?= $kunci == '1' ? 'Pemungutan suara akan dibuka' : 'Semua pemungutan suara akan dikunci dan dihentikan.' ?></p>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>