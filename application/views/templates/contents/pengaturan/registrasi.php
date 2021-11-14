<div class="row">
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Halaman Registrasi Guru</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Halaman Aktif
                        <input type="checkbox" id="guru" data-toggle="switchbutton" <?= $guru['nilai'] == 1 ? 'checked' : '' ?> data-onstyle="success" data-offstyle="danger" data-size="xs">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Terakhir Diubah
                        <small id="guru-update"><?= $guru['updated_at'] ?></small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Halaman Registrasi Siswa</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Halaman Aktif
                        <input type="checkbox" id="siswa" data-toggle="switchbutton" <?= $siswa['nilai'] == 1 ? 'checked' : '' ?> data-onstyle="success" data-offstyle="danger" data-size="xs">
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Terakhir Diubah
                        <small id="siswa-update"><?= $siswa['updated_at'] ?></small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>