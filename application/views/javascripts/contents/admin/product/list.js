const data_calon = new Map();
$(function () {
  $("#fhead").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/product/item/update_head`,
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
        "url": "<?= base_url()?>admin/product/item/ajax_data/",
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
        { "data": 'name' },
        { "data": 'slug' },
        {
          "data": 'price', render(data, type, full, meta) {
            return `Rp. ${format_rupiah(data)}`
          },
        },
        { "data": 'view_home_str' },
        { "data": 'status_str' },
        {

          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
                <a class="btn btn-secondary btn-xs" href="<?= base_url() ?>admin/product/item/review/${data}">
                  <i class="fa fa-list"></i> Review
                </a>
                <a class="btn btn-info btn-xs" href="<?= base_url() ?>produk/detail/${full.slug}">
                  <i class="fa fa-eye"></i> Lihat
                </a>
                <a class="btn btn-primary btn-xs" href="<?= base_url() ?>admin/product/item/create/${data}">
                  <i class="fa fa-edit"></i> Ubah
                </a>
                <button class="btn btn-danger btn-xs"
                data-id="${full.id}"
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
  dynamic_v2();

  // delete
  $("#fdelete").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      url: '<?= base_url() ?>admin/product/item/delete',
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

// Click Hapus
const Hapus = (datas) => {
  const data = datas.dataset;
  $("#delete-id").val(data.id)
  $('#delete').modal('toggle')
}