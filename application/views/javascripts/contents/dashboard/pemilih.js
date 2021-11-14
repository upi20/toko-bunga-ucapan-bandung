function switchDetail(id) {
  $('.detail').each(function () {
    $(this).fadeOut();
  })
  $('#detail_calon_' + id).fadeIn()
}

// Click Ubah
const Pilih = (datas) => {
  const data = datas.dataset;
  $('#id').val(data.id);
  $('#title').html('Apakah anda yakin akan memilih ' + data.nama);
}

$("#fmain").submit(function (ev) {
  ev.preventDefault();
  const form = new FormData(this);
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>dashboard/pilih',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
  }).done((data) => {
    if (!data) {

      Toast.fire({
        icon: 'error',
        title: 'Pemungutan suara sudah ditutup/dikunci'
      })
      return;
    }
    Toast.fire({
      icon: 'success',
      title: 'Data berhasil disimpan'
    })

    setTimeout(() => {
      document.location.reload();
    }, 300);
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Data gagal disimpan'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
    $('#tambahModal').modal('toggle')
  })
});

function dynamic(datas = {
  kategori: null,
  kelas: null,
}) {
  let filter = null;
  if (datas.kategori != null && datas.kelas != null) {
    filter = {
      kategori: datas.kategori,
      kelas: datas.kelas,
    }
  }
  const table_html = $('#dt_basic');
  table_html.dataTable().fnDestroy()
  const new_table = table_html.DataTable({
    "ajax": {
      "url": "<?= base_url()?>admin/count/ajax_data/",
      "data": datas,
      "type": 'POST'
    },
    "processing": true,
    "serverSide": true,
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "columns": [
      // { "data": null },
      { "data": "no_urut" },
      { "data": "nama", className: "nowrap" },
      { "data": "jumlah_suara", className: "text-right" },
    ],
    order: [
      [0, 'asc']
    ],
    // columnDefs: [{
    //     orderable: false,
    //     targets: [0]
    // }],
  });
  // new_table.on('draw.dt', function () {
  //     var PageInfo = table_html.DataTable().page.info();
  //     new_table.column(0, {
  //         page: 'current'
  //     }).nodes().each(function (cell, i) {
  //         cell.innerHTML = i + 1 + PageInfo.start;
  //     });
  // });
}

if ($("#finish").val() == 1) {
  dynamic();
}