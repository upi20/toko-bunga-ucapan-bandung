<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Data Testimoni</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="" id="fhead">
      <div class="form-group">
        <label for="head_value1">Judul</label>
        <input type="text" class="form-control" id="head_value1" name="head_value1" placeholder="Judul" value="<?= $head['value1'] ?>" />
      </div>

      <div class="form-group">
        <label for="head_value2">Sub Judul</label>
        <input type="text" class="form-control" id="head_value2" name="head_value2" placeholder="Sub Judul" value="<?= $head['value2'] ?>" />
      </div>
      <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-save"></i> Simpan</button>
    </form>
    <hr>
    <div class="d-flex justify-content-between align-items-center my-2">
      <label for="dt_basic">List Data</label>
      <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#tambahModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
    </div>
    <table id="dt_basic" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Sebagai</th>
          <th>Deskripsi</th>
          <th>Gambar</th>
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
          <div class="form-group">
            <label for="position">Sebagai</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Contoh pelanggan, pengusaha dan lain lain" required />
          </div>
          <div class="form-group">
            <label for="foto">Gambar</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea cols="3" rows="4" class="form-control" id="description" name="description" placeholder="Deskripsi"></textarea>
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