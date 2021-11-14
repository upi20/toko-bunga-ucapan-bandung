$(() => {
    var msnry = new Masonry(document.querySelector('.grid'), {
        // options
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer'
    });
    records.forEach(e => {
        const change = (data, id_menu) => {
            let status = data.prop("checked");
            data.prop("disabled", true);

            if (status) {
                window.apiClient.pengaturanLevel.insertHakAkses(data.data('level'), Number(id_menu)).done((e) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Diubah.'
                    })
                    data.prop("checked", status);
                    data.prop("disabled", false);

                }).fail(($xhr) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal Diubah.'
                    })
                    data.prop("checked", !status);
                    data.prop("disabled", false);
                })
            } else {
                window.apiClient.pengaturanLevel.deleteHakAkses(data.data('level'), Number(id_menu)).done((e) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Diubah.'
                    })
                    data.prop("checked", status);
                    data.prop("disabled", false);

                }).fail(($xhr) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Gagal Diubah.'
                    })
                    data.prop("checked", !status);
                    data.prop("disabled", false);
                })
            }
        }



        // membuat datatable
        // $('#tabel-hak-akses-' + e.menu.menu_id).DataTable();

        // ketika hak akses sub menu di click
        e.sub_menu.forEach(e => {
            $("#menu-hak-akses-" + e.menu_id).on("click", () => {
                change($("#menu-hak-akses-" + e.menu_id), e.menu_id);
            });
        });

        // ketika hak akses menu di click
        $("#menu-hak-akses-" + e.menu.menu_id).on("click", () => {
            change($("#menu-hak-akses-" + e.menu.menu_id), e.menu.menu_id);
        });
    });
})