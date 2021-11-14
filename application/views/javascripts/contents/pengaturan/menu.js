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
            data.parent,
            data.nama,
            data.keterangan,
            data.index,
            '<i class="' + data.icon + '"></i> ' + data.icon,
            data.url,
            data.status,
            '<div>'
            + '<button class="btn btn-primary btn-sm  mr-1" onclick="Ubah(' + data.id + ')"><i class="fa fa-edit"></i> Ubah</button>'
            + '<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id + ')"><i class="fa fa-trash"></i> Hapus</button>'
            + '</div>'
        ]

        let $node = $($table.row.add(row).draw().node())
        $node.attr('data-id', data.id)
    }


    // Fungsi Delete
    $('#OkCheck').click(() => {
        $.LoadingOverlay("show");
        let id = $("#idCheck").val()

        window.apiClient.pengaturanMenu.delete(id)
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

    // Edit Row
    const editRow = (id, data) => {
        let row = $table.row('[data-id=' + id + ']').index()

        $($table.row(row).node()).attr('data-id', id)
        $table.cell(row, 0).data(data.parent)
        $table.cell(row, 1).data(data.nama)
        $table.cell(row, 2).data(data.keterangan)
        $table.cell(row, 3).data(data.index)
        $table.cell(row, 4).data('<i class="' + data.icon + '"></i> ' + data.icon)
        $table.cell(row, 5).data(data.url)
        $table.cell(row, 6).data(data.status)
    }

    // Delete Row
    const deleteRow = (id) => {
        $table.row('[data-id=' + id + ']').remove().draw()
    }

    // Fungsi simpan
    $('#form-tambah').submit((ev) => {
        ev.preventDefault()

        let id = $('#id').val()
        let menu_menu_id = $('#menu_menu_id').val()
        let nama = $('#nama').val()
        let index = $('#index').val()
        let icon = $('#icon').val()
        let url = $('#url').val()
        let keterangan = $('#keterangan').val()
        let status = $('#status').val()

        if (id == "") {
            // Insert
            $.LoadingOverlay("show");
            window.apiClient.pengaturanMenu.insert(menu_menu_id, nama, index, icon, url, keterangan, status)
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
                    $('#modal').modal('toggle')
                    $.LoadingOverlay("hide");
                })
        }
        else {
            // Update
            $.LoadingOverlay("show");
            window.apiClient.pengaturanMenu.update(id, menu_menu_id, nama, index, icon, url, keterangan, status)
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
                    $('#modal').modal('toggle')
                    $.LoadingOverlay("hide");
                })
        }
    })

    // Clik Tambah
    $('#btn-tambah').on('click', () => {
        $('#modal-title').html('Tambah Menu')
        $('#id').val('')
        $('#menu_menu_id').val('')
        $('#nama').val('')
        $('#index').val('')
        $('#icon').val('')
        $('#url').val('')
        $('#keterangan').val('')
        $('#status').val('')
    })
})

const Ubah = (id) => {
    // $.LoadingOverlay("show");
    window.apiClient.pengaturanMenu.detail(id)
        .done((data) => {
            $('#modal-title').html('Ubah Menu')
            $('#id').val(data.id)
            $('#menu_menu_id').val(data.parent == 0 ? "" : data.parent)
            $('#nama').val(data.nama)
            $('#index').val(data.index)
            $('#icon').val(data.icon)
            $('#url').val(data.url)
            $('#keterangan').val(data.keterangan)
            $('#status').val(data.status)
            $('#modal').modal('toggle')
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

const Hapus = (id) => {
    $("#idCheck").val(id)
    $("#LabelCheck").text('Form Hapus')
    $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
    $('#ModalCheck').modal('toggle')
}