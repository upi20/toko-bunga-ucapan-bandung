const data_calon = new Map();
$(function () {
  function dynamic_v2(datas = { partner: null }) {
    let filter = null;
    if (datas.partner != null) {
      filter = {
        partner: datas.partner,
      }
    }
    const table_html = $('#dt_basic_v2');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/CalonKetua/ajax_data/",
        "data": datas,
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": true,
      "columns": [
        { "data": null },
        { "data": 'npm' },
        { "data": 'nama' },
        { "data": 'no_urut' },
        {
          "data": "photo", render(data, type, full, meta) {
            return `<button
              class="btn btn-success btn-sm btn-gambar"
              data-toggle="modal"
              data-data="${data}"
              data-target="#gambar_modal"
              onclick="view_gambar(this)"
              id="btn-gambar"><i class="fas fa-eye"></i></button>`
          }, className: "nowrap"
        },
        {
          "data": "visi", render(data, type, full, meta) {
            data_calon.set('visi_' + full.id, data);
            return `<button
              class="btn btn-success btn-sm btn-gambar"
              data-toggle="modal"
              data-data="${full.id}"
              data-target="#visi_modal"
              onclick="visi(this)"
              id="btn-visi"><i class="fas fa-eye"></i></button>`
          }, className: "nowrap"
        },
        {
          "data": "misi", render(data, type, full, meta) {
            data_calon.set('misi_' + full.id, data);
            return `<button
              class="btn btn-success btn-sm btn-gambar"
              data-toggle="modal"
              data-data="${full.id}"
              data-target="#misi_modal"
              onclick="misi(this)"
              id="btn-misi"><i class="fas fa-eye"></i></button>`
          }, className: "nowrap"
        },
        { "data": 'status_str' },
        {

          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
                <a class="btn btn-primary btn-xs" href="<?= base_url() ?>admin/CalonKetua/tambah/${data}">
                  <i class="fa fa-edit"></i> Ubah
                </a>
                <button class="btn btn-danger btn-xs"
                data-id_calon="${full.id}"
                data-id_user="${full.id_user}"
                onclick="Hapus(this)">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </div>`
          }, className: "nowrap"
        },
      ],
      order: [
        [1, 'asc']
      ],
      columnDefs: [{
        orderable: false,
        targets: [0, 8]
      }],
    });
    new_table.on('draw.dt', function () {
      var PageInfo = table_html.DataTable().page.info();
      new_table.column(0, {
        page: 'current'
      }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });
  }
  dynamic_v2();

  // delete
  $("#fdelete").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      url: '<?= base_url() ?>admin/CalonKetua/delete',
      cache: false,
      contentType: false,
      processData: false,
      data: form,
      type: 'post',
      success: function (data) {
        Toast.fire({
          icon: 'success',
          title: 'Berhasil Dihapus'
        })
        dynamic_v2();
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal Dihapus'
        })
        console.log(data);
      },
      complete: function () {
        $.LoadingOverlay("hide");
        $('#delete').modal('toggle')
      }
    });
  });

})




const view_gambar = (datas) => {
  $("#img-view").attr('src', `<?= base_url() ?>/files/calon/${datas.dataset.data}`)
}

const visi = (datas) => {
  $("#body_visi_modal").html(data_calon.get('visi_' + datas.dataset.data))
}

const misi = (datas) => {
  $("#body_misi_modal").html(data_calon.get('misi_' + datas.dataset.data))
}

// Click Hapus
const Hapus = (datas) => {
  const data = datas.dataset;
  $("#delete-id_calon").val(data.id_calon)
  $('#delete').modal('toggle')
}