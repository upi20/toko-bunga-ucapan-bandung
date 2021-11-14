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
                <button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
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
                <button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
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
                      onclick="photo_preview(this)"
                      id="btn-gambar"><i class="fas fa-eye  "></i></button>
                <button class="btn btn-danger btn-xs" onclick="Hapus(${data})">
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
  $("#image_from").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('product_id', $('#id').val());
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/product/item/images_insert',
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
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
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
      url: '<?= base_url() ?>admin/CalonKetua/simpan',
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
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
    })
  });
});

function photo_preview(datas) {
  const data = datas.dataset;
  const img = $("#foto-preview");
  $("#fot_preview").modal('toggle');
  img.attr('src', `<?= base_url() ?>/files/product/pictures/${data.src}`);
  img.attr('alt', data.alt);
}