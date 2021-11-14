<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">Data Profile</h3>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                <form id="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $getID; ?>">

                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required />
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="users">Pilih Users</label>
                                <select class="form-control" id="users" name="users" required>
                                    <option value="">NIK / EMAIL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="membership">Membership</label>
                                <select class="form-control" id="membership" name="membership" required></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Tanggal Verifikasi</label>
                                <input type="date" class="form-control" id="tgl-verifikasi" name="tgl-verifikasi" placeholder="Tanggal Verifikasi" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Status Verifikasi</label>
                                <select class="form-control" id="jk" name="jk" required>
                                    <option value="">Pilih Status Verifikasi</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="jk">Contact</label>
                            <!-- <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#contact" id="btn-contact"><i class="fa fa-plus"></i> Tambah</a> -->
                            <a class="btn btn-primary btn-xs" onclick="ubah_contact(<?= $getID ?>)"><i class="fa fa-edit"></i> Ubah</a>
                            <table id="tblContact" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Jenis Kontak</th>
                                        <th>Nilai Kontak</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#lalamat" id="btn-lalamat"><i class="fa fa-plus"></i> Tambah</a>
                            <table id="tblAlamat" class="table table-bordered table-striped table-hover">
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

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="jk">Formal</label>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#formal" id="btn-formal"><i class="fa fa-plus"></i> Tambah</a>
                            <table id="tblFormal" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Peristiwa Formal</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <label for="jk">Education</label>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#education" id="btn-education"><i class="fa fa-plus"></i> Tambah</a>
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

                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a class="btn btn-danger" href="<?= base_url() ?>/data-master/profile/">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
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
                                <label for="no_telepon">Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Telepon" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkeIn" required />
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


<!-- lalamat -->
<div class="modal fade" id="lalamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="jenis_alamat" name="jenis_alamat" placeholder="Jenis Alamat" required />
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
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" required />
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
                                    <option value="0">Tidak Aktif</option>
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
                            <div class="form-group">
                                <label for="peristiwa_formal">Peristiwa</label>
                                <!-- <input type="text" class="form-control" id="peristiwa_formal" name="peristiwa_formal" placeholder="Peristiwa" required /> -->
                                <textarea class="form-control" id="peristiwa_formal" name="peristiwa_formal" placeholder="Peristiwa" required cols="30" rows="10"></textarea>
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
                                    <option value="0">Tidak Aktif</option>
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
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Gelar" required />
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
                                    <option value="0">Tidak Aktif</option>
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