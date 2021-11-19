$(document).ready(() => {
  // table
  // category
  function table_category() {
    const table_html = $('#table_category');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/product/item/ajax_data_categories/",
        "data": { product_id: $("#id").val() },
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
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
                <button class="btn btn-danger btn-xs" onclick="category_delete('${data}')">
                <i class="fa fa-trash"></i>
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
        targets: [0, 2]
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

  // color
  function table_color() {
    const table_html = $('#table_color');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/product/item/ajax_data_colors/",
        "data": { product_id: $("#id").val() },
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
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
            <button class="btn btn-danger btn-xs" onclick="color_delete('${data}')">
            <i class="fa fa-trash"></i>
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
        targets: [0, 2]
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

  // image
  function table_image() {
    const table_html = $('#table_image');
    table_html.dataTable().fnDestroy()
    const new_table = table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>admin/product/item/images_ajax_data/",
        "data": { product_id: $("#id").val() },
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "columns": [
        { "data": "number" },
        { "data": "name" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
            <button
                      class="btn btn-success btn-sm btn-gambar btn-xs"
                      data-toggle="modal"
                      data-src="${full.foto}"
                      data-alt="${full.name}"
                      data-target="#fot_preview"
                      onclick="image_preview(this)"
                      id="btn-gambar"><i class="fas fa-eye  "></i></button>
                <button
                  data-foto="${full.foto}"
                  data-id="${full.id}"
                  data-name="${full.name}"
                  data-number="${full.number}"
                  class="btn btn-info btn-xs" onclick="image_edit(this)">
                  <i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-xs"
                  data-foto="${full.foto}"
                  data-id="${full.id}"
                  onclick="image_delete(this)">
                  <i class="fa fa-trash"></i>
                </button>
              </div>`
          }, className: "nowrap"
        }
      ],
      order: [
        [0, 'asc']
      ],
      columnDefs: [{
        orderable: false,
        targets: [2]
      }],
    });
  }

  // initial table
  table_category();
  table_color();
  table_image();

  // insert

  // image
  $("#image_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/images_${$('#image_id').val() == '' ? 'insert' : 'update'}`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      table_image();
      $("#image_modal").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#image_delete_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/delete_images`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      table_image();
      $("#image_modal_delete").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal dihapus'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#image_btn_tambah").click(() => {
    $('#image_modalTitle').html('Tambah Gambar');
    $('#image_id').val('');
    $("#image_name").val('');
    $("#image_number").val('');
    $("#image_foto").val('');
  })

  // category
  $("#category_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/insert_category`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      table_category();
      $("#category_modal").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#category_delete_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/delete_category`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      table_category();
      $("#category_modal_delete").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal dihapus'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  // color
  $("#color_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/insert_color`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      table_color();
      $("#color_modal").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#color_delete_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/delete_color`,
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      table_color();
      $("#color_modal_delete").modal('toggle');
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal dihapus'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });

  $("#name").keyup(function () {
    var Text = $(this).val();
    $("#slug").val(Text.toLowerCase()
      .replace(/[^\w ]+/g, '')
      .replace(/ +/g, '-'));
  });

  $('.summernote').summernote({
    toolbar: [
      ['fontsize', ['fontsize']], ['fontname', ['fontname']], ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['color', ['color']], ['float', ['floatLeft', 'floatRight', 'floatNone']], ['remove', ['removeMedia']], ['table', ['table']], ['insert', ['link', 'unlink', 'video', 'audio', 'hr']], ['mybutton', ['myVideo']], ['view', ['fullscreen', 'codeview']], ['help', ['help']]],
    height: (200),
  })

  $("#main-form").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/product/item/simpan',
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
      }, 300)
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan, Mungkin slug sudah terdaftar'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });
});

function image_preview(datas) {
  const data = datas.dataset;
  const img = $("#foto-preview");
  $("#fot_preview").modal('toggle');
  img.attr('src', `<?= base_url() ?>/files/product/pictures/${data.src}`);
  img.attr('alt', data.alt);
}

function image_edit(datas) {
  const data = datas.dataset;
  $("#image_modal").modal('toggle');
  $('#image_modalTitle').html('Ubah Gambar');
  $("#image_id").val(data.id);
  $("#image_temp").val(data.foto);
  $("#image_name").val(data.name);
  $("#image_number").val(data.number);
}

function image_delete(datas) {
  const data = datas.dataset;
  $("#image_modal_delete").modal('toggle');
  $("#image_detail_id").val(data.id);
  $("#image_delete").val(data.foto);
}

// category
function category_delete(id) {
  $("#category_modal_delete").modal('toggle');
  $("#category_detail_id").val(id);
}

// color
function color_delete(id) {
  $("#color_modal_delete").modal('toggle');
  $("#color_detail_id").val(id);
}
