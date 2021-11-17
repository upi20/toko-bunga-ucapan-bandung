$(function () {
  function dynamic() {
    const table_html = $('#dt_basic');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/home/slider/ajax_data/",
        "data": null,
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "columns": [
        { "data": null },
        { "data": "name" },
        { "data": "title" },
        { "data": "subtitle" },
        { "data": "description" },
        {
          "data": "foto", render(data, type, full, meta) {
            return `<button
                      class="btn btn-success btn-sm btn-gambar"
                      data-toggle="modal"
                      data-data="${data}"
                      data-target="#gambar_modal"
                      onclick="view_gambar(this)"
                      id="btn-gambar"><i class="fas fa-eye"></i></button>`
          }, className: "nowrap"
        },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
            <a class="btn btn-info btn-xs" href="<?= base_url()?>">
            <i class="fa fa-eye"></i> Lihat
          </a>
                <button class="btn btn-primary btn-xs"
                                      data-id="${data}"
                                      data-name="${full.name}"
                                      data-title="${full.title}"
                                      data-subtitle="${full.subtitle}"
                                      data-foto="${full.foto}"
                                      data-description="${full.description}"
                                      data-status="${full.status}"
                                      data-toggle="modal" data-target="#tambahModal"
                                  onclick="Ubah(this)">
                  <i class="fa fa-edit"></i> Ubah
                </button>
                <button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </div>`
          }, className: "nowrap"
        }
      ],
      order: [
        [1, 'asc']
      ],
      columnDefs: [{
        orderable: false,
        targets: [0, 7]
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
  dynamic();

  $("#btn-tambah").click(() => {
    $("#tambahModalTitle").text("Tambah Slider");
    $('#id').val('');
    $('#name').val('');
    $('#title').val('');
    $('#subtitle').val('');
    $('#foto').val('');
    $('#description').val('');
    $('#status').val('1');
  });

  $("#fmain").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/home/slider/' + ($("#id").val() == "" ? 'insert' : 'update'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      dynamic();
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

  // hapus
  $('#OkCheck').click(() => {
    let id = $("#idCheck").val()
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/home/slider/delete',
      data: {
        id: id
      }
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      dynamic();
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

const view_gambar = (datas) => {
  $("#img-view").attr('src', `<?= base_url() ?>/files/home/slider/${datas.dataset.data}`)
}

// Click Hapus
const Hapus = (id) => {
  $("#idCheck").val(id)
  $("#LabelCheck").text('Form Hapus')
  $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
  $('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (datas) => {
  const data = datas.dataset;
  $('#id').val(data.id);
  $('#temp_foto').val(data.foto);
  $('#title').val(data.title);
  $('#subtitle').val(data.subtitle);
  $('#foto').val('');
  $('#name').val(data.name);
  $('#description').val(data.description);
  $('#status').val(data.status);
  $("#tambahModalTitle").text("Ubah Slider");
}