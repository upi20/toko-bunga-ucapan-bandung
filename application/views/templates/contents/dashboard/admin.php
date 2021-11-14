<style>
    .db-hover:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
</style>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Calon Ketua</span>
                <span class="info-box-number">
                    <?= $calonKetua ?> Orang
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Pemilih</span>
                <span class="info-box-number">
                    <?= $pemilih ?> Orang
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Sudah Pilih</span>
                <span class="info-box-number">
                    <?= $sudahPilih ?> Orang
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Belum Pilih</span>
                <span class="info-box-number">
                    <?= $belumPilih ?> Orang
                </span>
            </div>
        </div>
    </div>
</div>