<style>
  .db-hover:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
  }
</style>
<div class="row">
  <?php foreach ($calons as $calon) : ?>
    <div class="col-lg-4 col-md-6">
      <div class="card db-hover" style="width: 100%; border-radius:16px; <?= ($calon->pilih != 0) ? 'border:2px solid red' : '' ?>">
        <img class="card-img-top" src="<?= base_url() ?>files/calon/<?= $calon->photo ?>" alt="<?= $calon->nama ?>" style="border-radius: 16px 16px 0 0;">
        <?php if ($calon->pilih != 0) : ?>
          <span class="badge bg-warning text-dark position-absolute card-badge mt-3 ml-3"><?= $calon->dipilih_waktu ?></span>
        <?php endif ?>
        <div class="card-body">
          <h4 class="text-center"><?= $calon->nama ?> ( <?= $calon->no_urut ?> )</h4>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#detail_calon_<?= $calon->id ?>" class="btn btn-info" style="border-radius:16px" onclick="switchDetail(<?= $calon->id ?>)"><i class="fa fa-user"></i> Lihat Profile</a>
            <?php if ($calon->status_pilih == 0) : ?>
              <button class="btn btn-primary" style="border-radius:16px" data-toggle="modal" data-target="#tambahModal" data-id="<?= $calon->id ?>" data-nama="<?= $calon->nama ?>" onclick="Pilih(this)"><i class="fa fa-check"></i> Pilih Calon</button>
            <?php elseif ($calon->pilih != 0) : ?>
              <button class="btn btn-warning" style="border-radius:16px"><i class="fa fa-check"></i> Dipilih</button>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php if (false) : ?>
  <h5>Hasil Pemungutan Suara</h5>
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-primary card-outline " style="border-radius: 16px;">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">Perhitungan Suara Calon Ketua</h3>
            <div>
              <a href="<?= base_url() ?>admin/Count/export_pdf" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Export PDF</a>
              <a href="<?= base_url() ?>admin/Count/export_excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</a>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dt_basic" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <!-- <th>No</th> -->
                <th style="max-width: 75px;">No Urut</th>
                <th>Nama</th>
                <th style="max-width: 100px;">Jumlah Suara</th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
<?php endif ?>

<?php foreach ($calons as $calon) : ?>
  <div class="card detail" style="border-radius: 16px; display:none;" id="detail_calon_<?= $calon->id ?>">
    <div class="card-header">
      <div class="d-flex justify-content-between w-100">
        <h3 class="card-title">Data Calon Ketua <?= $calon->nama ?></h3>
        <button class="btn btn-danger" href="#" style="border-radius: 16px;" onclick="$('#detail_calon_<?= $calon->id ?>').fadeOut()">Close</button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <h5>Nama</h5>
      <p><?= $calon->nama ?></p>
      <hr>
      <h5>Nomor Pokok Pengurus</h5>
      <p><?= $calon->npm ?></p>
      <hr>
      <h5>Visi</h5>
      <p><?= $calon->visi ?></p>
      <hr>
      <h5><?= $calon->misi ?></h5>
      <p></p>
    </div>
    <!-- /.card-body -->
  </div>
<?php endforeach; ?>


<!-- hasil akhir -->



<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center" id="tambahModalTitle">Pilih Calon Ketua</h5>
      </div>
      <div class="modal-body">
        <form action="" id="fmain" method="post">
          <input type="hidden" id="id" name="id">
        </form>
        <p id="title"> </p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="fmain"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="finish" value="0">