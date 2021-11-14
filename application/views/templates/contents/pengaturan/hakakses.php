<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between w-100">
            <h3 class="card-title">List Data Hak Akses</h3>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="btn-tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Parent</th>
                    <th>Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $q) : ?>
                    <tr data-id="<?= $q['rola_id'] ?>">
                        <td><?= $q['lev_nama'] ?></td>
                        <td><?= $q['parent'] ?></td>
                        <td><?= $q['menu_nama'] ?></td>
                        <td>
                            <div>
                                <button class="btn btn-primary btn-sm" onclick="Ubah(<?= $q['rola_id'] ?>)">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['rola_id'] ?>)">
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
                    <h4 class="modal-title" id="myModalLabel">Tambah Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama"> Level</label>
                                <select class="form-control" required id="level">
                                    <option value="">--Pilih Level--</option>
                                    <?php foreach ($level as $lev) : ?>
                                        <option value="<?= $lev['lev_id'] ?>"><?= $lev['lev_nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"> Menu</label>
                                <select class="form-control" required id="menu">
                                    <option value="">--Pilih Menu--</option>
                                    <?php foreach ($parent as $pa) : ?>
                                        <option value="<?= $pa['menu_id'] ?>"><?= $pa['menu_nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"> Sub Menu</label>
                                <select class="form-control" id="sub_menu">
                                    <option value="">--Pilih Sub Menu--</option>
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