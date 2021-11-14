let tabelHapus = '';
$(function () {
    // pilih membership
    ajax_select(false, '#membership', '<?= base_url(); ?>/pengaturan/profile/ajax_select_list_membership', null, '#myModal', 'Pilih Jenis Membership');

    // buat ulang tabel contact
    function tblContact(data) {
        data = data.data
        console.log(data)
        $('#tblContact').html(`
        <thead>
            <tr>
                <th>Jenis Kontak</th>
                <th>Nilai Kontak</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Telepon</td>
                <td>${data[0]['no_telepon']}</td>
            </tr>
            <tr>
                <td>Instagram</td>
                <td>${data[0]['instagram']}</td>
            </tr>
            <tr>
                <td>Youtube</td>
                <td>${data[0]['youtube']}</td>
            </tr>
            <tr>
                <td>LinkedIn</td>
                <td>${data[0]['linkedin']}</td>
            </tr>
        </tbody>
        `)
    }

    // tabel Alamat
    function tblAlamat() {
        const idp = $("#id").val()
        const table_html = $('#tblAlamat');
        table_html.dataTable().fnDestroy()
        table_html.DataTable({
            "ajax": {
                "url": "<?= base_url()?>pengaturan/profile/getAlamat/",
                "data": { idp: idp },
                "type": 'POST'
            },
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "columns": [
                { "data": "jenis_alamat" },
                { "data": "domisili" },
                { "data": "alamat" },
                { "data": "tanggal_mulai" },
                { "data": "tanggal_selesai" },
                { "data": "status_str" },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<div class="pull-right">
									<button class="btn btn-primary btn-xs" onclick="ubah_alamat(${data})">
										<i class="fa fa-edit"></i> Ubah
									</button>
									<button class="btn btn-danger btn-xs" onclick="Hapus(${data},'alamat')">
										<i class="fa fa-trash"></i> Hapus
									</button>
								</div>`
                    }, className: "nowrap"
                }
            ],
        });
    }

    // tabel Formal
    function tblFormal() {
        const idp = $("#id").val()
        const table_html = $('#tblFormal');
        table_html.dataTable().fnDestroy()
        table_html.DataTable({
            "ajax": {
                "url": "<?= base_url()?>pengaturan/profile/getFormal/",
                "data": { idp: idp },
                "type": 'POST'
            },
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "columns": [
                { "data": "peristiwa_formal" },
                { "data": "tempat" },
                { "data": "tanggal_data_formal" },
                { "data": "status_str" },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<div class="pull-right">
									<button class="btn btn-primary btn-xs" onclick="ubah_formal(${data})">
										<i class="fa fa-edit"></i> Ubah
									</button>
									<button class="btn btn-danger btn-xs" onclick="Hapus(${data},'data_formal')">
										<i class="fa fa-trash"></i> Hapus
									</button>
								</div>`
                    }, className: "nowrap"
                }
            ],
        });
    }

    // tabel Education
    function tblEducation() {
        const idp = $("#id").val()
        const table_html = $('#tblEducation');
        table_html.dataTable().fnDestroy()
        table_html.DataTable({
            "ajax": {
                "url": "<?= base_url()?>pengaturan/profile/getEducation/",
                "data": { idp: idp },
                "type": 'POST'
            },
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "searching": false,
            "paging": false,
            "info": false,
            "columns": [
                { "data": "nama" },
                { "data": "tanggal_lulus" },
                { "data": "lembaga" },
                { "data": "status_str" },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<div class="pull-right">
									<button class="btn btn-primary btn-xs" onclick="ubah_education(${data})">
										<i class="fa fa-edit"></i> Ubah
									</button>
									<button class="btn btn-danger btn-xs" onclick="Hapus(${data},'gelar')">
										<i class="fa fa-trash"></i> Hapus
									</button>
								</div>`
                    }, className: "nowrap"
                }
            ],
        });
    }

    tblAlamat();
    tblFormal();
    tblEducation();

    // tambah dan ubah
    $("#fcontact").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_contact").val() == "" ? 'insert_contact' : 'update_contact'),
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            tblContact(data);
            tblAlamat();
            tblFormal();
            tblEducation();
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal disimpan'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
            $('#contact').modal('toggle')
        })
    });


    $("#btn-lalamat").click(() => {
        $('#id_contact').val("");
        // $('#id_profile').val("");
        $('#jenis_alamat').val("");
        $('#alamat').val("");
        $('#domisili').val("");
        $('#tanggal_mulai').val("");
        $('#tanggal_selesai').val("");
        $('#status').val("1");
    });

    $("#btn-formal").click(() => {
        $('#id_alamat').val("");
        $('#peristiwa_formal').val("");
        $('#tanggal_data_formal').val("");
        $('#tempat').val("");
        $('#statusf').val("1");
    });

    $("#btn-education").click(() => {
        $('#id_education').val("");
        $('#nama').val("");
        $('#tanggal_lulus').val("");
        $('#lembaga').val("");
        $('#statuse').val("1");
    });


    $("#falamat").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        form.append('id_profile', $('#id').val())
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_alamat").val() == "" ? 'insert_alamat' : 'update_alamat'),
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            tblAlamat();
            tblFormal();
            tblEducation();
            $('#lalamat').modal('hide')
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal disimpan'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
            $('#lalamat').modal('toggle')
        })
    });

    $("#fformal").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        form.append('id_profile', $('#id').val())
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_formal").val() == "" ? 'insert_formal' : 'update_formal'),
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            tblAlamat();
            tblFormal();
            tblEducation();
            $('#formal').modal('hide')
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal disimpan'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
            $('#formal').modal('toggle')
        })
    });

    $("#feducation").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        form.append('id_profile', $('#id').val())
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_education").val() == "" ? 'insert_education' : 'update_education'),
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            tblAlamat();
            tblFormal();
            tblEducation();
            $('#education').modal('hide')
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal disimpan'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
            $('#education').modal('toggle')
        })
    });

    $("#main-form").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/simpan',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })

        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal disimpan'
            })
            setTimeout(() => {

            }, 300);
        }).always(() => {
            $.LoadingOverlay("hide");
        })
    });


    // hapus
    $('#OkCheck').click(() => {
        let id = $("#idCheck").val()
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/hapusDaftar',
            data: {
                id: id,
                tbl: tabelHapus
            }
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dihapus'
            })
            tblAlamat();
            tblFormal();
            tblEducation();
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal dihapus'
            })
        }).always(() => {
            $('#ModalCheck').modal('toggle')
            $.LoadingOverlay("hide");
        })
    })

})

// Click Hapus
const Hapus = (id, tbl) => {
    $("#idCheck").val(id)
    tabelHapus = tbl
    $("#LabelCheck").text('Form Hapus')
    $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
    $('#ModalCheck').modal('toggle')
}
// Click Ubah
const ubah_contact = (id) => {
    $.LoadingOverlay("show");
    $.ajax({
        method: 'post',
        url: '<?= base_url() ?>pengaturan/profile/getContact',
        data: {
            id: id
        }
    }).done((data) => {
        if (data.data) {
            data = data.data[0];
            $("#myModalLabel").text("Ubah Contact");
            $('#id_contact').val(data.id);
            $('#no_telepon').val(data.no_telepon);
            $('#instagram').val(data.instagram);
            $('#youtube').val(data.youtube);
            $('#linkedin').val(data.linkedin);
            $('#contact').modal('toggle')
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Data tidak valid.'
            })
        }
    }).fail(($xhr) => {
        Toast.fire({
            icon: 'error',
            title: 'Gagal mendapatkan data.'
        })
    }).always(() => {
        $.LoadingOverlay("hide");
    })
}
const ubah_alamat = (id) => {
    const idp = $("#id").val()
    $.LoadingOverlay("show");
    $.ajax({
        method: 'post',
        url: '<?= base_url() ?>pengaturan/profile/getAlamat',
        data: {
            idp: idp,
            id: id
        }
    }).done((data) => {
        if (data.data) {
            data = data.data[0];
            $("#myModalLabel").text("Ubah Alamat");
            $('#id_alamat').val(data.id);
            $('#jenis_alamat').val(data.jenis_alamat);
            $('#alamat').val(data.alamat);
            $('#domisili').val(data.domisili);
            $('#tanggal_mulai').val(data.tanggal_mulai);
            $('#tanggal_selesai').val(data.tanggal_selesai);
            $('#status').val(data.status);
            $('#lalamat').modal('toggle')
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Data tidak valid.'
            })
        }
    }).fail(($xhr) => {
        Toast.fire({
            icon: 'error',
            title: 'Gagal mendapatkan data.'
        })
    }).always(() => {
        $.LoadingOverlay("hide");
    })
}
const ubah_formal = (id) => {
    const idp = $("#id").val()
    $.LoadingOverlay("show");
    $.ajax({
        method: 'post',
        url: '<?= base_url() ?>pengaturan/profile/getFormal',
        data: {
            idp: idp,
            id: id
        }
    }).done((data) => {
        if (data.data) {
            data = data.data[0];
            $("#myModalLabel").text("Ubah Formal");
            $('#id_formal').val(data.id);
            $('#peristiwa_formal').val(data.peristiwa_formal);
            $('#tempat').val(data.tempat);
            $('#tanggal_data_formal').val(data.tanggal_data_formal);
            $('#statusf').val(data.status);
            $('#formal').modal('toggle')
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Data tidak valid.'
            })
        }
    }).fail(($xhr) => {
        Toast.fire({
            icon: 'error',
            title: 'Gagal mendapatkan data.'
        })
    }).always(() => {
        $.LoadingOverlay("hide");
    })
}
const ubah_education = (id) => {
    const idp = $("#id").val()
    $.LoadingOverlay("show");
    $.ajax({
        method: 'post',
        url: '<?= base_url() ?>pengaturan/profile/getEducation',
        data: {
            idp: idp,
            id: id
        }
    }).done((data) => {
        if (data.data) {
            data = data.data[0];
            $("#myModalLabel").text("Ubah Education");
            $('#id_education').val(data.id);
            $('#nama').val(data.nama);
            $('#tanggal_lulus').val(data.tanggal_lulus);
            $('#lembaga').val(data.lembaga);
            $('#statuse').val(data.status);
            $('#education').modal('toggle')
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Data tidak valid.'
            })
        }
    }).fail(($xhr) => {
        Toast.fire({
            icon: 'error',
            title: 'Gagal mendapatkan data.'
        })
    }).always(() => {
        $.LoadingOverlay("hide");
    })
}