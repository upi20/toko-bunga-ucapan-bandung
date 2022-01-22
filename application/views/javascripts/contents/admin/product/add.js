$(document).ready(() => {
  $('.select2-class').select2();

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
  table_image();

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
      url: '<?= base_url() ?>admin/product/item/save',
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