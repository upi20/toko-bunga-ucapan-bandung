$(document).ready(() => {
  $('.summernote').summernote({
    toolbar: [
      ['fontsize', ['fontsize']], ['fontname', ['fontname']], ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['color', ['color']], ['float', ['floatLeft', 'floatRight', 'floatNone']], ['remove', ['removeMedia']], ['table', ['table']], ['insert', ['link', 'unlink', 'video', 'audio', 'hr']], ['mybutton', ['myVideo']], ['view', ['fullscreen', 'codeview']], ['help', ['help']]],
    height: (200),
  })

  // datatable
  function dt_list() {
    const table_html = $('#footer_list');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/home/footer/list_ajax/",
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
        { "data": "link" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
              <button class="btn btn-primary btn-xs"
                                    data-id="${data}"
                                    data-name="${full.name}"
                                    data-link="${full.link}"
                                    data-status="${full.status}"
                                    data-toggle="modal" data-target="#modal_list"
                                onclick="ubah_list(this)">
                <i class="fa fa-edit"></i> Ubah
              </button>
              <button class="btn btn-danger btn-xs"
              data-toggle="modal" data-target="#modal_list_delete"
              data-id="${data}" onclick="hapus_list(this)">
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
        targets: [0, 4]
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
  dt_list();

  function dt_sosmed() {
    const table_html = $('#tsosmed');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/home/footer/sosmed_ajax/",
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
        { "data": "icon" },
        { "data": "link" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
              <button class="btn btn-primary btn-xs"
                                    data-id="${data}"
                                    data-name="${full.name}"
                                    data-link="${full.link}"
                                    data-icon="${full.icon}"
                                    data-status="${full.status}"
                                    data-toggle="modal" data-target="#modal_sosmed"
                                onclick="ubah_sosmed(this)">
                <i class="fa fa-edit"></i> Ubah
              </button>
              <button class="btn btn-danger btn-xs"
              data-toggle="modal" data-target="#modal_sosmed_delete"
              data-id="${data}" onclick="hapus_sosmed(this)">
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
        targets: [0, 4]
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
  dt_sosmed();


  $("#fcontact").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/footer/contact_title_update`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#flist").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/footer/list_head_update`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#fcopyright").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/footer/copyright_update`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#fmain2").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/offer/update2`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });


  // list
  $("#btn-tambah-list").click(() => {
    $("#modal_listLabel").text("Tambah List Data");
    $('#list_id').val('');
    $('#list_name').val('');
    $('#list_link').val('');
    $('#list_status').val('1');
  });

  $("#flistmodel").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/home/footer/list_' + ($("#list_id").val() == "" ? 'insert' : 'update'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      dt_list();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#modal_list').modal('toggle')
    })
  });

  $("#fhapuslistmodel").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/footer/list_delete`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      dt_list();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal dihapus'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $("#modal_list_delete").modal('toggle');
    })
  });

  // sosmed
  $("#btn-tambah-sosmed").click(() => {
    $("#modal_sosmedLabel").text("Tambah Sosial Media");
    $('#sosmed_id').val('');
    $('#sosmed_name').val('');
    $('#sosmed_icon').val('');
    $('#sosmed_link').val('');
    $('#sosmed_status').val('1');
  });

  $("#fsosmedmodel").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/home/footer/sosmed_' + ($("#sosmed_id").val() == "" ? 'insert' : 'update'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      dt_sosmed();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#modal_sosmed').modal('toggle')
    })
  });

  $("#fhapussosmedmodel").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/footer/sosmed_delete`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      dt_sosmed();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal dihapus'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $("#modal_sosmed_delete").modal('toggle');
    })
  });

});

const ubah_list = datas => {
  const data = datas.dataset;
  $('#list_id').val(data.id);
  $('#list_link').val(data.link);
  $('#list_name').val(data.name);
  $('#list_status').val(data.status);
  $("#modal_listLabel").text("Ubah List Data");
}
const hapus_list = datas => {
  const data = datas.dataset;
  $('#list_delete_id').val(data.id);
  $("#modal_list_deleteLabel").text("Hapus List Data");
}

const ubah_sosmed = datas => {
  const data = datas.dataset;
  $('#sosmed_id').val(data.id);
  $('#sosmed_link').val(data.link);
  $('#sosmed_icon').val(data.icon);
  $('#sosmed_name').val(data.name);
  $('#sosmed_status').val(data.status);
  $("#modal_sosmedLabel").text("Ubah Sosial Media");
}

const hapus_sosmed = datas => {
  const data = datas.dataset;
  $('#sosmed_delete_id').val(data.id);
  $("#modal_sosmed_deleteLabel").text("Hapus Sosial Media");
}