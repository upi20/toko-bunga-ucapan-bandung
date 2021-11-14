$(() => {
    $("#guru").change(function () {
        sendUpdate('guru', this.checked ? 1 : 0)
    });

    $("#siswa").change(function () {
        sendUpdate('siswa', this.checked ? 1 : 0)
    });

    function sendUpdate(nama, nilai) {
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/registrasi/update',
            data: {
                nama: nama,
                nilai: nilai,
            },
        }).done((data) => {
            $(`#${nama}-update`).html(data);
            Toast.fire({
                icon: 'success',
                title: 'Berhasil diubah.'
            })
        }).fail(($xhr) => {
            console.log($xhr);
            Toast.fire({
                icon: 'error',
                title: 'Gagal diubah.'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
        })
    }
});