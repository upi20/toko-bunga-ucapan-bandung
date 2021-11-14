$(document).ready(function () {
    const $table = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    $table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Add Row
    const addRow = (data) => {
        let row = [
            data.nama,
            data.keterangan,
            data.status,
            '<div>'
            + '<a href="<?= base_url() ?>pengaturan/hakakseslevel/' + data.id + '" class="btn btn-info btn-sm mr-1"><i class="fa fa-key"></i> Hak Akses</a>'
            + '<button class="btn btn-primary btn-sm mr-1" onclick="Ubah(' + data.id + ')"><i class="fa fa-edit"></i> Ubah</button>'
            + '<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id + ')"><i class="fa fa-trash"></i> Hapus</button>'
            + '</div>'
        ]

        let $node = $($table.row.add(row).draw().node())
        $node.attr('data-id', data.id)
    }

    // Edit Row
    const editRow = (id, data) => {
        let row = $table.row('[data-id=' + id + ']').index()

        $($table.row(row).node()).attr('data-id', id)
        $table.cell(row, 0).data(data.nama)
        $table.cell(row, 1).data(data.keterangan)
        $table.cell(row, 2).data(data.status)
    }

    // Delete Row
    const deleteRow = (id) => {
        $table.row('[data-id=' + id + ']').remove().draw()
    }





    // Fungsi simpan
    $('#form').submit((ev) => {
        ev.preventDefault()

        let id = $('#id').val()
        let nama = $('#nama').val()
        let keterangan = $('#keterangan').val()
        let status = $('#status').val()

        if (id == 0) {

            // Insert
            $.LoadingOverlay("show");
            window.apiClient.pengaturanLevel.insert(nama, keterangan, status)
                .done((data) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil ditambahkan.'
                    })
                    addRow(data)

                })
                .fail(($xhr) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal ditambahkan.'
                    })
                }).
                always(() => {
                    $('#myModal').modal('toggle')
                    $.LoadingOverlay("hide");
                })
        }
        else {

            // Update
            $.LoadingOverlay("show");
            window.apiClient.pengaturanLevel.update(id, nama, keterangan, status)
                .done((data) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil diubah.'
                    })
                    editRow(id, data)
                })
                .fail(($xhr) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal Diubah..'
                    })
                }).
                always(() => {
                    $('#myModal').modal('toggle')
                    $.LoadingOverlay("hide");
                })
        }
    })

    // Fungsi Delete
    $('#OkCheck').click(() => {
        $.LoadingOverlay("show");
        let id = $("#idCheck").val()

        window.apiClient.pengaturanLevel.delete(id)
            .done((data) => {
                Toast.fire({
                    icon: 'success',
                    title: 'Berhasil dihapus.'
                })
                deleteRow(id)
            })
            .fail(($xhr) => {
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal dihapus.'
                })
            }).
            always(() => {
                $('#ModalCheck').modal('toggle')
                $.LoadingOverlay("hide");
            })
    })

    // Clik Tambah
    $('#btn-tambah').on('click', () => {
        $('#myModalLabel').html('Tambah Level')
        $('#id').val('')
        $('#nama').val('')
        $('#keterangan').val('')
        $('#status').val('')
    })

})

// Click Hapus
const Hapus = (id) => {
    $("#idCheck").val(id)
    $("#LabelCheck").text('Form Hapus')
    $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
    $('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (id) => {
    // $.LoadingOverlay("show");
    window.apiClient.pengaturanLevel.detail(id)
        .done((data) => {

            $('#myModalLabel').html('Ubah Level')
            $('#id').val(data.id)
            $('#nama').val(data.nama)
            $('#keterangan').val(data.keterangan)
            $('#status').val(data.status)

            $('#myModal').modal('toggle')
        })
        .fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Gagal mendapatkan data.'
            })
        })
        .always(() => {
            // $.LoadingOverlay("hide");
        })
}