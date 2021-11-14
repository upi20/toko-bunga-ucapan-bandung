<style>
    /* #dt_basic {
        overflow-x: scroll;
        max-width: 40%;
        display: block;
        white-space: nowrap;
    } */
</style>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">List Profile</h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button> -->
                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>pengaturan/profile/tambah"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dt_basic" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Jenis Kelamin</th>
                    <th>Photo</th>
                    <th>Tanggal Verifikasi</th>
                    <th>Status Verifikasi</th>
                    <th>Membership</th>
                    <th>Contact</th>
                    <th>Alamat</th>
                    <th>Data Formal</th>
                    <th>Education</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- photo -->
<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5 class="modal-title text-center">Photo</h5>
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url() ?>\assets\images\student.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5 class="modal-title text-center">Contact</h5>
            <div class="card">
                <div class="card-body">
                    <table id="tbl_contact" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Jenis Kontak</th>
                                <th>Nilai Kontak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>WhatsApp</td>
                                <td>0812851215</td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>@instagram</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- alamat -->
<div class="modal fade" id="lalamat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5 class="modal-title text-center">Alamat</h5>
            <div class="card">
                <div class="card-body">
                    <table id="" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Jenis Alamat</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Proyek</td>
                                <td>Bandung</td>
                                <td>01-01-2020</td>
                                <td>01-01-2022</td>
                                <td>Aktif</td>
                            </tr>
                            <tr>
                                <td>Proyek</td>
                                <td>Jakarta</td>
                                <td>02-02-2020</td>
                                <td>02-02-2021</td>
                                <td>Tidak Aktif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- formal -->
<div class="modal fade" id="formal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5 class="modal-title text-center">Formal</h5>
            <div class="card">
                <div class="card-body">
                    <table id="" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Peristiwa Formal</th>
                                <th>Tanggal</th>
                                <th>Tempat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Seminar</td>
                                <td>01-01-2020</td>
                                <td>Bandung</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>


<!-- education -->
<div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h5 class="modal-title text-center">Education</h5>
            <div class="card">
                <div class="card-body">
                    <table id="" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Gelar</th>
                                <th>Tanggal Lulus</th>
                                <th>Lembaga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sarjana Teknik</td>
                                <td>01-01-2015</td>
                                <td>UNIKOM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>