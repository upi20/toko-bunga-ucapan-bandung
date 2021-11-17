$(function () {
  function dynamic() {
    const table_html = $('#dt_basic');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/whatsapp/ajax_data/",
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
        {
          "data": "number", render(data, type, full, meta) {
            return `+62${data}`;
          }
        },
        { "data": "description" },
        {
          "data": "status", render(data, type, full, meta) {
            let str = full.status_str;
            if (data == 0) {
              str = `<span class="text-danger font-weight-bold">${full.status_str}</span>`;
            } else if (data == 1) {
              str = `<span class="text-success font-weight-bold">${full.status_str}</span>`;
            }
            return str;
          }
        },
        {
          "data": "id", render(data, type, full, meta) {
            let btn_delete = `
                <button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
                  <i class="fa fa-trash"></i> Hapus
                </button>
            `;
            let btn_aktifkan = `
                <button class="btn btn-info btn-xs" onclick="Aktifkan('${data}')">
                  <i class="fa fa-check"></i> Aktifkan
                </button>
            `;

            let btn_ubah = `
                            <button class="btn btn-primary btn-xs"
                                  data-id="${data}"
                                  data-name="${full.name}"
                                  data-number="${full.number}"
                                  data-description="${full.description}"
                                  data-toggle="modal" data-target="#tambahModal"
                                  onclick="Ubah(this)">
                              <i class="fa fa-edit"></i> Ubah
                            </button>
            `;
            return `<div class="pull-right">

                ${full.status == 0 ? btn_aktifkan + btn_delete : ''}
                ${btn_ubah}
              </div>`
          }, className: "nowrap"
        }
      ],
      order: [
        [4, 'desc']
      ],
      columnDefs: [{
        orderable: false,
        targets: [0, 5]
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
    $("#tambahModalTitle").text("Tambah Nomor WhatsApp");
    $('#id').val('');
    $('#name').val('');
    $('#number').val('');
    $('#description').val('');
  });

  $("#fmain").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/whatsapp/' + ($("#id").val() == "" ? 'insert' : 'update'),
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

  $("#faktifkan").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/whatsapp/activate',
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
      $('#modal_aktifkan').modal('toggle')
    })
  });

  // hapus
  $('#OkCheck').click(() => {
    let id = $("#idCheck").val()
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/whatsapp/delete',
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
  $("#img-view").attr('src', `<?= base_url() ?>/files/whatsapp/${datas.dataset.data}`)
}

// Click Hapus
const Hapus = (id) => {
  $("#idCheck").val(id)
  $("#LabelCheck").text('Form Hapus')
  $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
  $('#ModalCheck').modal('toggle')
}

// Click Hapus
const Aktifkan = (id) => {
  $("#aktifkan_id").val(id)
  $('#modal_aktifkan').modal('toggle')
}

// Click Ubah
const Ubah = (datas) => {
  const data = datas.dataset;
  $('#id').val(data.id);
  $('#title').val(data.title);
  $('#number').val(data.number);
  $('#name').val(data.name);
  $('#description').val(data.description);
  $("#tambahModalTitle").text("Ubah Nomor WhatsApp");
}