<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">List Nomor WhatsApp</h3>
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt_basic" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nomor</th>
          <th>Keterangan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
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
          <input type="hidden" id="temp_foto" name="temp_foto">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required />
          </div>

          <label for="number">Nomor Whatsapp</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">+62</span>
            </div>
            <input type="number" class="form-control" id="number" name="number" placeholder="ex: 85798132505" required />
          </div>
          <div class="form-group">
            <label for="description">Keterangan</label>
            <textarea cols="3" rows="4" class="form-control" id="description" name="description" placeholder="Keterangan"></textarea>
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

<div class="modal fade" id="modal_aktifkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header outline-info">
        <h5 class="modal-title text-center">Aktifkan Normor WhatsApp</h5>
      </div>
      <div class="modal-body">
        <form action="" id="faktifkan">
          <input type="hidden" name="id" id="aktifkan_id">
        </form>
        Apakah anda yakin akan mengaktifkan nomor whatsapp ini..?
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-ef btn-ef-3 btn-ef-3c" type="submit" form="faktifkan"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
      </div>
    </div>
  </div>
</div>