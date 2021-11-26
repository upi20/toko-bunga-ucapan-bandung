$(function () {
  function dynamic() {
    const table_html = $('#dt_basic');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/home/contact/ajax_data/",
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
        { "data": "title" },
        { "data": "description" },
        { "data": "column" },
        { "data": "icon" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
            <a class="btn btn-info btn-xs" href="<?= base_url('contact')?>">
            <i class="fa fa-eye"></i> Lihat
          </a>
                <button class="btn btn-primary btn-xs"
                                      data-id="${data}"
                                      data-title="${full.title}"
                                      data-column="${full.column}"
                                      data-icon="${full.icon}"
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
        targets: [0, 6]
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
    $("#tambahModalTitle").text("Tambah Contact Item");
    $('#id').val('');
    $('#title').val('');
    $('#column').val('');
    $('#icon').val('');
    $('#description').val('');
    $('#status').val('1');
  });

  $("#fmain").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/home/contact/' + ($("#id").val() == "" ? 'insert' : 'update'),
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
      url: '<?= base_url() ?>admin/home/contact/delete',
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

  $("#fmap").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/contact/update_maps`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      setTimeout(() => {
        window.location.reload();
      }, 3000)
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });
})

const view_gambar = (datas) => {
  $("#img-view").attr('src', `<?= base_url() ?>/files/home/contact/${datas.dataset.data}`)
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
  $('#title').val(data.title);
  $('#column').val(data.column);
  $('#icon').val(data.icon);
  $('#description').val(data.description);
  $('#status').val(data.status);
  $("#tambahModalTitle").text("Ubah Contact Item");
}