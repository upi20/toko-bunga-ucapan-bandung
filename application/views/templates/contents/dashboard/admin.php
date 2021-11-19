<style>
    .db-hover:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
</style>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fan"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Produk</span>
                <span class="info-box-number">
                    <?= $product ?> Produk
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Kategori</span>
                <span class="info-box-number">
                    <?= $category ?> Kategori
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-palette"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Warna</span>
                <span class="info-box-number">
                    <?= $color ?> Warna
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="far fa-comments"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Preview</span>
                <span class="info-box-number">
                    <?= $reveiw ?> Preview
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-image"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Gambar</span>
                <span class="info-box-number">
                    <?= $images ?> Gambar
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fab fa-whatsapp"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah No Whatsapp</span>
                <span class="info-box-number">
                    <?= $whatsapp ?> No Whatsapp
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-images"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Slider</span>
                <span class="info-box-number">
                    <?= $slider ?> Slider
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Testimoni</span>
                <span class="info-box-number">
                    <?= $testimoni ?> Testimoni
                </span>
            </div>
        </div>
    </div>
</div>