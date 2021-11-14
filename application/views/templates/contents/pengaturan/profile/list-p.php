<style>
    /* #dt_basic {
        overflow-x: scroll;
        max-width: 40%;
        display: block;
        white-space: nowrap;
    } */
</style>

<div class="card card-info card-outline" id="filter">
    <div class="card-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-end align-items-star w-100 flex-md-row flex-column">
                <input type="hidden" name="stfilter" id="stfilter" value="0">
                <h3 class="card-title align-self-center">Filter : </h3>
                <div class="ml-md-2">
                    <select class="form-control" id="filter-partner" name="filter-partner" style=" min-width:200px" value=""></select>
                </div>
                <div class="ml-md-2">
                    <button type="button" class="btn btn-info btn" id="btn-filter">Cari</button>
                </div>
                <div class="ml-md-2">
                    <a class="btn btn-warning btn" href="">Reset filter</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">List Profile</h3>
            <div class="row">
                <div class="col-md-12">
                    <a id="btn_export_pdf" href="<?= base_url() ?>pengaturan/profile/export_pdf" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Export PDF</a>
                    <a id="btn_export" href="<?= base_url() ?>pengaturan/profile/export_excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</a>
                    <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#import"><i class="fas fa-file-excel"></i> <span>Import Excel</span></button> -->
                    <!-- <a class="btn btn-primary btn-sm" href="<?= base_url() ?>pengaturan/profile/tambah"><i class="fa fa-plus"></i> Tambah</a> -->
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="dt_basic_v2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th class="text-center align-middle" rowspan='2' colspan='1'>Aksi</th> -->
                    <th class="text-center align-middle" rowspan='2' colspan='1'>Level</th>
                    <th class="text-center align-middle" rowspan='2' colspan='1'>Partner</th>
                    <th class="text-center align-middle" rowspan='2' colspan='1'>NIK</th>
                    <th class="text-center align-middle" rowspan='2' colspan='1'>Email</th>
                    <th class="text-center align-middle" rowspan='1' colspan='2'>Nama</th>
                    <th class="text-center align-middle" rowspan='2' colspan='1'>Jenis Kelamin</th>
                    <th class="text-center align-middle" rowspan='2' colspan='1'>Foto</th>
                    <th class="text-center align-middle" rowspan='1' colspan='2'>Membership</th>
                    <th class="text-center align-middle" rowspan='1' colspan='3'>Kontak</th>
                    <th class="text-center align-middle" rowspan='1' colspan='2'>Alamat</th>
                    <th class="text-center align-middle" rowspan='1' colspan='2'>Peristiwa</th>
                    <th class="text-center align-middle" rowspan='1' colspan='2'>Pendidikan</th>
                </tr>
                <tr>
                    <th class="text-center align-middle">Depan</th>
                    <th class="text-center align-middle">Belakang</th>
                    <th class="text-center align-middle">Sekarang</th>
                    <th class="text-center align-middle">Lengkap</th>
                    <th class="text-center align-middle">Tipe Kontak</th>
                    <th class="text-center align-middle">Keterangan</th>
                    <th class="text-center align-middle">Lengkap</th>
                    <th class="text-center align-middle">Sekarang</th>
                    <th class="text-center align-middle">Lengkap</th>
                    <th class="text-center align-middle">Formal</th>
                    <th class="text-center align-middle">Lengkap</th>
                    <th class="text-center align-middle">Terakhir</th>
                    <th class="text-center align-middle">Lengkap</th>
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
            <div class="modal-header outline-info">
                <h5 class="modal-title text-center">Photo</h5>
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

<!-- contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Contact</h5>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-striped table-hover">
                    <thead id="tbl-head-contact">
                    </thead>
                    <tbody id="tbl-body-contact">
                    </tbody>
                </table>
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
            <div class="modal-header">
                <h5 class="modal-title text-center">Alamat</h5>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-striped table-hover">
                    <thead id="tbl-head-alamat">
                    </thead>
                    <tbody id="tbl-body-alamat">
                    </tbody>
                </table>
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
            <div class="modal-header">
                <h5 class="modal-title text-center">Formal</h5>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-striped table-hover">
                    <thead id="tbl-head-formal">
                    </thead>
                    <tbody id="tbl-body-formal">
                    </tbody>
                </table>
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
            <div class="modal-header">
                <h5 class="modal-title text-center">Education</h5>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-striped table-hover">
                    <thead id="tbl-head-education">
                    </thead>
                    <tbody id="tbl-body-education">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- membership -->
<div class="modal fade" id="membership" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Membership</h5>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered table-striped table-hover">
                    <thead id="tbl-head-membership">
                    </thead>
                    <tbody id="tbl-body-membership">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- profile -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Hapus Profile</h5>
            </div>
            <div class="modal-body">
                <form action="" id="fdelete">
                    <input type="hidden" name="id_profile" id="delete-id_profile">
                    <input type="hidden" name="id_user" id="delete-id_user">
                    <p>Apakah anda yakin akan menghapus profile ini..?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-ef btn-ef-3 btn-ef-3c" form="fdelete"><i class="fa fa-check"></i> Hapus</button>
                <button class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="importExcel" method="post" enctype="multipart/form-data" action="<?= base_url() ?>pengaturan/profile/import_excel" id="form-import">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Import Data</h3>
                </div>
                <div class="modal-body">
                    <label>File(.xls) <a href="<?= base_url() ?>pengaturan/profile/downloadSample">Download sample file import</a></label>
                    <br>
                    <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                </div>
                <div class="modal-footer">
                    <button id="clickImport" type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Submit</button>

                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>