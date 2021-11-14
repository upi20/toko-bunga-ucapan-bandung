$(function () {

    function dynamic() {
        const table_html = $('#dt_basic');
        table_html.dataTable().fnDestroy()
         table_html.DataTable({
            "ajax": {
                "url": "<?= base_url()?>pengaturan/profile/ajax_data/",
                "data": null,
                "type": 'POST'
            },
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "scrollX": true,
            "columns": [
                { "data": "nik" },
                { "data": "email" },
                { "data": "nama_depan" },
                { "data": "nama_belakang" },
                { "data": "jk" },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#photo" id="btn-photo"><i class="fas fa-search"></i></button>`
                    }, className: "nowrap"
                },
                { "data": "tanggal_anggota" },
                { "data": "st_ver" },
                { "data": "membership" },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#contact" id="btn-contact" onclick="contact(${data})"><i class="fas fa-search"></i></button>`
                    }, className: "nowrap"
                },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#lalamat" id="btn-lalamat"><i class="fas fa-search"></i></button>`
                    }, className: "nowrap"
                },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#formal" id="btn-formal"><i class="fas fa-search"></i></button>`
                    }, className: "nowrap"
                },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#education" id="btn-education"><i class="fas fa-search"></i></button>`
                    }, className: "nowrap"
                },
                {
                    "data": "id", render(data, type, full, meta) {
                        return `<div class="pull-right">
									<button class="btn btn-primary btn-xs" onclick="Ubah(${data})">
										<i class="fa fa-edit"></i> Ubah
									</button>
									<button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
										<i class="fa fa-trash"></i> Hapus
									</button>
								</div>`
                    }, className: "nowrap"
                }
            ],
        });
    }
    dynamic();

    $("#btn-tambah").click(() => {
        $("#myModalLabel").text("Tambah List Profile");
        $('#id').val("");
        $('#nama').val("");
        $('#alamat').val("");
        $('#no_telp').val("");
        $('#email').val("");
        $('#resiko').val("");
        $('#remark').val("");
    });

    // tambah dan ubah
    $("#form").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        $.LoadingOverlay("show");
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil disimpan'
        })
        $.LoadingOverlay("hide");
        $('#myModal').modal('toggle')
    });

    // hapus
    $('#OkCheck').click(() => {
        let id = $("#idCheck").val()
        $.LoadingOverlay("show");
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil dihapus'
        })
        $('#ModalCheck').modal('toggle')
        $.LoadingOverlay("hide");
    })

})

// Click Hapus
const Hapus = (id) => {
    $("#idCheck").val(id)
    $("#LabelCheck").text('Form Hapus')
    $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
    $('#ModalCheck').modal('toggle')
}
// const contact = (id) => {
//     $('#contact').modal('toggle')
//     const table_html = $('#tbl_contact');
//         table_html.dataTable().fnDestroy()
//          table_html.DataTable({
//             "ajax": {
//                 "url": "<?= base_url()?>pengaturan/profile/getContact/",
//                 "data": {
//                     id: id
//                 },
//                 "type": 'POST'
//             },
//             "processing": true,
//             "serverSide": true,
//             "responsive": false,
//             "lengthChange": true,
//             "autoWidth": false,
//             "scrollX": true,
//             "columns": [
//                 { "data": "nik" },
//                 { "data": "email" }
//             ],
//         });
// }
