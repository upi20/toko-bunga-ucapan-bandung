<?php
$bg_color = [
    // 'primary',
    'secondary',
    'success',
    'danger',
    'warning',
    'info',
    // 'light',
    'dark',
];
?>
<div class="conteiner">
    <div class="grid">
        <div class="grid-sizer col-md-6 col-lg-4"></div>
        <?php foreach ($records as $record) : ?>
            <div class="grid-item col-md-6 col-lg-4">
                <div class="card card-<?= $bg_color[array_rand($bg_color)] ?>">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h3 class="card-title"><?= $record['menu']['menu_nama']; ?></h3>
                            <div class="pull-right">
                                <?php if ($record['menu']['akses']) : ?>
                                    <input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $record['menu']['menu_id'] ?>" checked>
                                <?php else : ?>
                                    <input type="checkbox" class="form-check-input" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $record['menu']['menu_id'] ?>">
                                <?php endif; ?>
                                <label class="form-check-label" for="menu-hak-akses-<?= $record['menu']['menu_id'] ?>">Hak Akses</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <?php if (count($record['sub_menu'])) : ?>
                        <div class="card-body">
                            <table id="tabel-hak-akses-<?= $record['menu']['menu_id'] ?>" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Sub Menu</th>
                                        <th>Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($record['sub_menu'] as $submenu) : ?>
                                        <tr data-id="<?= $submenu['menu_id'] ?>">
                                            <td><?= $submenu['menu_nama'] ?></td>
                                            <td>
                                                <?php if ($submenu['akses']) : ?>
                                                    <input type="checkbox" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $submenu['menu_id'] ?>" checked>
                                                <?php else : ?>
                                                    <input type="checkbox" data-level="<?= $id_level ?>" id="menu-hak-akses-<?= $submenu['menu_id'] ?>">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                    <!-- /.card-body -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <a style="float: right;" href="<?=base_url()?>pengaturan/level" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<script>
    const records = <?= json_encode($records) ?>;
</script>