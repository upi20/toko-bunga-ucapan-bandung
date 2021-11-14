<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">List Data Level Pengguna</h3>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Level</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $q) : ?>
                    <tr data-id="<?= $q['lev_id'] ?>">
                        <td><?= $q['lev_nama'] ?></td>
                        <td><?= $q['lev_keterangan'] ?></td>
                        <td><?= $q['lev_status'] ?></td>
                        <td>
                            <div>
                                <a href="<?= base_url() ?>pengaturan/hakakseslevel/<?= $q['lev_id'] ?>" class="btn btn-info btn-sm mr-1"><i class="fa fa-key"></i> Hak Akses</a>
                                <button class="btn btn-primary btn-sm" onclick="Ubah(<?= $q['lev_id'] ?>)">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['lev_id'] ?>)">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama"> Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama"> Keterangan</label>
                                <textarea class="form-control" id="keterangan" placeholder="Keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama"> Status</label>
                                <select class="form-control" required id="status">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
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
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->