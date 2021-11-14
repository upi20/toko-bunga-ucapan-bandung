<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="d-flex justify-content-between w-100">
                    <h3 class="card-title">Tabel Perhitungan Suara Calon Ketua</h3>
                    <div>
                        <a href="<?= base_url() ?>admin/Count/export_pdf" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Export PDF</a>
                        <a href="<?= base_url() ?>admin/Count/export_excel" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dt_basic" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <!-- <th>No</th> -->
                            <th style="max-width: 75px;">No Urut</th>
                            <th>Nama</th>
                            <th style="max-width: 100px;">Jumlah Suara</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>



    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    Chart Perhitungan Suara Calon Ketua
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <div id="donutchart" style="width: 100%; height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
    </div>



    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    Statistik Perhitungan Suara Calon Ketua
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
    </div>


</div>