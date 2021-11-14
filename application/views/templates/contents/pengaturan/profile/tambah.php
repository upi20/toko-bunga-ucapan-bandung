<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between w-100">
      <h3 class="card-title">Data Profile</h3>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form id="main-form" enctype="multipart/form-data">
      <div class="row">
        <input type="hidden" name="id" id="id" value="<?= $getID; ?>">
        <input type="hidden" name="is-ubah" id="is-ubah" value="<?= $isUbah ? 1 : 0; ?>">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required value="<?= $profile['nik'] ?>" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email</label>
            <?php
            if ($isUbah) {
              if ($profile['user_email_status'] == 1) {
                echo '<span class="font-weight-bold text-success"><i class="far fa-check-circle"></i> Verified</span>';
              } else {
                echo '<span class="font-weight-bold text-danger"><i class="far fa-times-circle"></i> Not Verified</span>
              <button class="btn btn-info btn-xs" type="button" onclick="konfirmasiEmail(this)" data-id="' . $profile['user_id'] . '" data-email="' . $profile['user_email'] . '">Konfirmasi Email</button>';
              }
            }
            ?>
            <input type="number" style="display: none;" id="is_ubah" name="is_ubah" required value="<?= $isUbah ? 1 : 0 ?>" />
            <input type="text" style="display: none;" id="user_id" name="user_id" value="<?= $profile['user_id'] ?>" />
            <input type="text" style="display: none;" id="current_email" name="current_email" value="<?= $profile['user_email'] ?>" />
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?= $profile['user_email'] ?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="nama_depan">Nama Depan</label>
            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required value="<?= $profile['nama_depan'] ?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="nama_belakang">Nama Belakang</label>
            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="<?= $profile['nama_belakang'] ?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" id="jk" name="jk" required>
              <option value="Laki-Laki" <?= $profile['jenis_kelamin'] == 1 ? 'selected' : '' ?>>Laki-Laki</option>
              <option value="Perempuan" <?= $profile['jenis_kelamin'] == 2 ? 'selected' : '' ?>>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="photo">Photo <?= $profile['photo'] != null ? "
            <a href=\"#\"
            data-src=\"{$profile['photo']}\"
            data-alt=\"{$profile['nama_depan']}\"
            onclick=\"photo_preview(this)\">
            Lihat </a>" : '' ?></label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo" ?>
          </div>
        </div>

        <!-- <div class="col-md-6">
          <div class="form-group">
            <label for="tgl-verifikasi">Tanggal Verifikasi</label>
            <input type="date" class="form-control" id="tgl-verifikasi" name="tgl-verifikasi" placeholder="Tanggal Verifikasi" required value="<?= $profile['tanggal_anggota'] ?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="approved">Status Verifikasi</label>
            <select class="form-control" id="approved" name="approved" required>
              <option value="">Pilih Status Verifikasi</option>
              <option value="Approved" <?= $profile['status_verifikasi'] == 1 ? 'selected' : '' ?>>Approved</option>
              <option value="Rejected" <?= $profile['status_verifikasi'] == 2 ? 'selected' : '' ?>>Rejected</option>
            </select>
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="id_partner">Partner</label>
            <select class="form-control" id="id_partner" name="id_partner">
              <option value="">Pilih Partner</option>
              <?php foreach ($partner as $p) : ?>
                <option value="<?= $p['id'] ?>" <?= $profile['id_partner'] == $p['id'] ? 'selected' : '' ?>><?= $p['text'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="id_level">Nama Level</label>
            <select class="form-control" id="id_level" name="id_level" required>
              <option value="">Pilih Nama Level</option>
              <?php foreach ($level as $p) :
                $selected = $profile['lev_id'] == $p['lev_id'] ? 'selected' : '';
                $selected = $profile['lev_id'] == null ? ($p['lev_nama'] == 'Reader' ?  'selected' : '') : $selected;
              ?>
                <option value="<?= $p['lev_id'] ?>" <?= $selected ?>><?= $p['lev_nama'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="btn-alamat">Alamat</label>
            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#alamat" id="btn-alamat"><i class="fa fa-plus"></i> Tambah</button>
          </div>

          <table id="tblalamat" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Jenis Alamat</th>
                <th>Domisili</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>


        <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="btn-membership">Membership</label>
            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#membership_modal" id="btn-membership"><i class="fa fa-plus"></i> Tambah</button>
          </div>
          <table id="tblmembership" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Jenis Membership</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="kontak">Kontak</label>
            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#contact" id="btn-kontak"><i class="fa fa-plus"></i> Tambah</button>
          </div>
          <table id="tblKontak" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Tipe Kontak</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

        <!-- <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="kontak">Kontak</label>
            <button type="button" id="kontak" class="btn btn-info btn-xs" onclick="ubah_contact(<?= $getID ?>)"><i class="fa fa-edit"></i> Ubah</button>
          </div>

          <table id="tblContact" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Jenis Kontak</th>
                <th>Nilai Kontak</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($contact)) : ?>
                <tr>
                  <td>Telepon</td>
                  <td><?= $contact[0]['no_telepon']; ?></td>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td><?= $contact[0]['instagram']; ?></td>
                </tr>
                <tr>
                  <td>Youtube</td>
                  <td><?= $contact[0]['youtube']; ?></td>
                </tr>
                <tr>
                  <td>LinkedIn</td>
                  <td><?= $contact[0]['linkedin']; ?></td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div> -->

        <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="btn-formal">Formal</label>
            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#formal" id="btn-formal"><i class="fa fa-plus"></i> Tambah</a>
          </div>
          <table id="tblFormal" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Peristiwa</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="col-md-6">
          <div class="d-flex justify-content-between align-items-center">
            <label for="btn-education">Education</label>
            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#education" id="btn-education"><i class="fa fa-plus"></i> Tambah</a>
          </div>
          <table id="tblEducation" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Gelar</th>
                <th>Tanggal Lulus</th>
                <th>Lembaga</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
  <div class="card-footer text-right">
    <button type="submit" form="main-form" class="btn btn-primary">
      Save
    </button>
    <a class="btn btn-danger" href="<?= base_url() ?>pengaturan/profile">Back</a>
  </div>
</div>

<!-- contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <form id="fcontact" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Contact</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_contact" id="id_contact">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="tipe_kontak">Tipe Kontak</label>
                <select class="form-control" name="tipe_kontak" id="tipe_kontak" style="width: 100%;" required>
                  <option value="">Pilih Tipe Kontak</option>
                  <?php foreach ($tipekontak as $kontak) : ?>
                    <option value="<?= $kontak['id'] ?>"><?= $kontak['text'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="statusk">Status</label>
                <select class="form-control" id="statusk" name="statusk" required>
                  <option value="">Pilih Status</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

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


<!-- alamat -->
<div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="falamat" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Alamat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_alamat" id="id_alamat">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="jenis_alamat">Jenis Alamat</label>
                <select class="form-control" name="jenis_alamat" id="jenis_alamat" style="width: 100%;" required>
                  <option value="">Pilih Jenis Alamat</option>
                  <?php foreach ($jenisalamat as $alamat) : ?>
                    <option value="<?= $alamat['id'] ?>"><?= $alamat['text'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="domisili">Domisili</label>
                <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Domisili" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="alamat">Deskripsi</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Deskripsi" required></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                  <option value="">Pilih Status</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

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


<!-- formal -->
<div class="modal fade" id="formal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="fformal" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Formal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_formal" id="id_formal">

          <div class="row">
            <div class="col-md-12">
              <label for="peristiwa_formal">Peristiwa</label>
              <select class="form-control" style="width: 100%;" id="peristiwa_formal" name="peristiwa_formal" required>
                <option value="">Pilih Peristiwa</option>
                <?php foreach ($peristiwa as $p) : ?>
                  <option value="<?= $p['id'] ?>"><?= $p['text'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="peristiwa_keterangan">Keterangan</label>
                <textarea class="form-control" id="peristiwa_keterangan" name="peristiwa_keterangan" placeholder="Peristiwa Keterangan" required rows="3"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="tanggal_data_formal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal_data_formal" name="tanggal_data_formal" placeholder="Tanggal" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="statusf">Status</label>
                <select class="form-control" id="statusf" name="statusf" required>
                  <option value="">Pilih Status</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

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


<!-- education -->
<div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <form id="feducation" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Education</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_education" id="id_education">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="nama">Gelar</label>
                <select class="form-control" name="nama" id="nama" style="width: 100%;" required>
                  <option value="">Pilih Gelar</option>
                  <?php foreach ($jenisgelar as $gelar) : ?>
                    <option value="<?= $gelar['id'] ?>"><?= $gelar['text'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="tanggal_lulus">Tanggal Lulus</label>
                <input type="date" class="form-control" id="tanggal_lulus" name="tanggal_lulus" placeholder="Tanggal Lulus" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="lembaga">Lembaga</label>
                <input type="text" class="form-control" id="lembaga" name="lembaga" placeholder="Lembaga" required />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="statuse">Status</label>
                <select class="form-control" id="statuse" name="statuse" required>
                  <option value="">Pilih Status</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

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


<!-- membership -->
<div class="modal fade" id="membership_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="fmembership" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="membership_modal_label">Membership</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_membership" id="id_membership">
          <div class="form-group">
            <label for="membership_jenis">Jenis Membership</label>
            <select class="form-control" style="width: 100%;" id="membership_jenis" name="membership_jenis" required>
              <?php foreach ($membership as $member) : ?>
                <option value="<?= $member['id'] ?>"><?= $member['text'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="membership_tanggal">Tanggal Anggota</label>
            <input type="date" class="form-control" id="membership_tanggal" name="membership_tanggal" placeholder="Tanggal Anggota" required />
          </div>
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

<!-- membership_active -->
<div class="modal fade" id="membership_active_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="fmembership_active" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="membership_active_modal_label">Aktifkan Membership</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_membership" id="id_membership_active">
          <div class="form-group">
            <div class="form-group">
              <label for="membership_active_name"></label>
              <input type="text" class="form-control" id="membership_active_name" name="membership_active_name" placeholder="" readonly />
            </div>
          </div>
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

<script>
  global_id_user = "<?= $profile['id_user'] ?? 0 ?>";
</script>