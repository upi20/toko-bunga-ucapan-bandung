<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">List Data Menu</h3>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Parent</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Index</th>
                    <th>Icon</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($records as $q) : ?>
                    <tr data-id="<?= $q['menu_id'] ?>">
                        <td><?= $q['parent'] ?></td>
                        <td><?= $q['menu_nama'] ?></td>
                        <td><?= $q['menu_keterangan'] ?></td>
                        <td><?= $q['menu_index'] ?></td>
                        <td><i class="<?= $q['menu_icon'] ?>"></i> <?= $q['menu_icon'] ?></td>
                        <td><?= $q['menu_url'] ?></td>
                        <td><?= $q['menu_status'] ?></td>
                        <td>
                            <div>
                                <button class="btn btn-primary btn-sm" onclick="Ubah(<?= $q['menu_id'] ?>)">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['menu_id'] ?>)">
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

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambah" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="menu_menu_id">Parent</label>
                                    <select class="form-control" id="menu_menu_id">
                                        <option value="">--Pilih Menu--</option>
                                        <?php foreach ($parent as $p) : ?>
                                            <option value="<?= $p['menu_id'] ?>"><?= $p['menu_nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Menu</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Menu" required>
                                <input type="hidden" class="form-control" id="id" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="index">Index Ke</label>
                                <input type="number" class="form-control" id="index" placeholder="Index Ke" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" id="icon" placeholder="icon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" required>
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" id="url" placeholder="url" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-tambah">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>