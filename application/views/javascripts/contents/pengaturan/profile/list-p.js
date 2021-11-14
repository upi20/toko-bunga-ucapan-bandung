$(function () {
    $('#filter-partner').select2();
    function dynamic_v2(datas = {
      partner: null,
  }) {
      let filter = null;
      if (datas.partner != null) {
          filter = {
              partner: datas.partner,
          }
      }
      const table_html = $('#dt_basic_v2');
      table_html.dataTable().fnDestroy()
      table_html.DataTable({
        "ajax": {
          "url": "<?= base_url()?>pengaturan/profile/ajax_data/",
          "data": datas,
          "type": 'POST'
        },
        "processing": true,
        "serverSide": true,
        "responsive": false,
        "lengthChange": true,
        "autoWidth": false,
        "scrollX": true,
        "columns": [
        //   {
        //     "data": "id", render(data, type, full, meta) {
        //       return `<div class="pull-right">
        //           <a class="btn btn-primary btn-xs" href="<?= base_url() ?>pengaturan/profile/tambah/${data}">
        //             <i class="fa fa-edit"></i> View
        //           </a>
        //           <button class="btn btn-danger btn-xs"
        //           data-id_profile="${full.id}"
        //           data-id_user="${full.id_user}"
        //           onclick="Hapus(this)">
        //             <i class="fa fa-trash"></i> Hapus
        //           </button>
        //         </div>`
        //     }, className: "nowrap"
        //   },
          { "data": "lev_nama" },
          { "data": "nama_partner" },
          { "data": "nik" },
          { "data": "email" },
          { "data": "nama_depan" },
          { "data": "nama_belakang" },
          { "data": "jk" },
          {
            "data": "photo", render(data, type, full, meta) {
              return `<a
              class="btn btn-photo"
              data-toggle="modal"
              data-data="${data}"
              data-target="#photo"
              onclick="view_photo(this)"
              id="btn-photo"><img height="100" width="100" src="<?= base_url() ?>/files/profile/${data}"/></a>`
            }, className: "nowrap"
          },
          { "data": "membership" },
          {
            "data": "id", render(data, type, full, meta) {
              return `<button
              class="btn btn-success btn-sm"
              data-toggle="modal"
              data-data="${data}"
              data-target="#membership"
              id="btn-membership"
              onclick="membership('${data}')"
              ><i class="fas fa-search"></i></button>`
            }, className: "nowrap"
          },
          { "data": "tipe_contact_sekarang" },
          { "data": "contact_sekarang" },
          {
            "data": "id", render(data, type, full, meta) {
              return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#contact" id="btn-contact"
              onclick="contact('${data}')"><i class="fas fa-search"></i></button>`
            }, className: "nowrap"
          },
          { "data": "alamat_sekarang" }, // alamat
          {
            "data": "id", render(data, type, full, meta) {
              return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#lalamat" id="btn-lalamat"
              onclick="alamat('${data}')"><i class="fas fa-search"></i></button>`
            }, className: "nowrap"
          },
          { "data": "peristiwa_formal" }, // peristiwa
          {
            "data": "id", render(data, type, full, meta) {
              return `<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#formal"
              onclick="formal('${data}')" id="btn-formal"><i class="fas fa-search"></i></button>`
            }, className: "nowrap"
          },
          { "data": "gelar_sekarang" }, // pendidikan
          {
            "data": "id", render(data, type, full, meta) {
              return `<button
              class="btn btn-success btn-sm"
              data-toggle="modal"
              data-data="${data}"
              data-target="#education"
              id="btn-education"
              onclick="education('${data}')"
              ><i class="fas fa-search"></i></button>`
            }, className: "nowrap"
          }
        ],
      });
    }
    dynamic_v2();
    ajax_select(null, '#filter-partner', '<?= base_url(); ?>/pengaturan/profile/ajax_select_list_partner', null, null, 'Pilih Partner');
  
    $("#btn-filter").click(() => {
      $('#stfilter').val(1);
      const partner = $('#filter-partner').val();
      var a = document.getElementById('btn_export');
      var b = document.getElementById('btn_export_pdf');
      var link = `<?= base_url() ?>pengaturan/profile/export_excel`;
      var link_pdf = `<?= base_url() ?>pengaturan/profile/export_pdf`;
      a.href = link + `?filter-partner=${partner}`;
      b.href = link_pdf + `?filter-partner=${partner}`;
      dynamic_v2({
          partner: partner,
      });
  });
    $("#btn-tambah").click(() => {
      $("#myModalLabel").text("Tambah List Profile");
      $('#id').val("");
      $('#nama').val("");
      $('#alamat').val("");
      $('#no_telp').val("");
      $('#email').val("");
      $('#resiko').val("");
      $('#remark').val("");
    });
  
      // Import
      $("#importExcel").submit(function (ev) {
        ev.preventDefault();
        const form = new FormData(this);
        $.LoadingOverlay("show");
        $.ajax({
            method: 'post',
            url: '<?= base_url() ?>pengaturan/profile/import_excel',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        }).done((data) => {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diimport'
            })
            window.location.replace("<?= base_url() ?>pengaturan/profile");
            dynamic();
        }).fail(($xhr) => {
            Toast.fire({
                icon: 'error',
                title: 'Data gagal diimport'
            })
        }).always(() => {
            $.LoadingOverlay("hide");
            $('#import').modal('toggle')
        })
    });
  
    // tambah dan ubah
    $("#form").submit(function (ev) {
      ev.preventDefault();
      const form = new FormData(this);
      $.LoadingOverlay("show");
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      $.LoadingOverlay("hide");
      $('#myModal').modal('toggle')
    });
  
    // delete
    $("#fdelete").submit(function (ev) {
      ev.preventDefault();
      const form = new FormData(this);
      $.LoadingOverlay("show");
      $.ajax({
        url: '<?= base_url() ?>pengaturan/profile/delete',
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
  
    // hapus
    $('#OkCheck').click(() => {
      let id = $("#idCheck").val()
      $.LoadingOverlay("show");
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      $('#ModalCheck').modal('toggle')
      $.LoadingOverlay("hide");
    })
  
  })
  
  // Click Hapus
  const Hapus = (datas) => {
    const data = datas.dataset;
    $("#delete-id_profile").val(data.id_profile)
    $("#delete-id_user").val(data.id_user)
    $('#delete').modal('toggle')
  }
  
  const view_photo = (datas) => {
    $("#img-view").attr('src', `<?= base_url() ?>/files/profile/${datas.dataset.data}`)
  }
  
  const contact = (id) => {
    $.ajax({
      url: '<?= base_url() ?>pengaturan/profile/getContact1',
      data: {
        idp: id
      },
      type: 'post',
      success: function (data) {
        data = data.data;
        $('#tbl-head-contact').html(`
            <tr>
              <th>Tipe Kontak</th>
              <th>Keterangan</th>
              <th>Status</th>
            </tr>
        `);
        $('#tbl-body-contact').html('');
        data.forEach((data) => {
          $('#tbl-body-contact').append(`
              <tr>
                  <td>${data.tipe_contact}</td>
                  <td>${data.keterangan}</td>
                  <td>${data.status_str}</td>
              </tr>
          `)
        })
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal mendapatkan data'
        })
        console.log(data);
      }
    });
  }
  
  const alamat = (id) => {
    $.ajax({
      url: '<?= base_url() ?>pengaturan/profile/getAlamat',
      data: {
        idp: id
      },
      type: 'post',
      success: function (data) {
        data = data.data;
        $('#tbl-head-alamat').html(`
            <tr>
              <th>Jenis Alamat</th>
              <th>Domisili</th>
              <th>Deskripsi</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Status</th>
            </tr>
        `);
        $('#tbl-body-alamat').html('');
        data.forEach((data) => {
          $('#tbl-body-alamat').append(`
              <tr>
                  <td>${data.jenis_alamat}</td>
                  <td>${data.domisili}</td>
                  <td>${data.alamat}</td>
                  <td>${data.tanggal_mulai}</td>
                  <td>${data.tanggal_selesai}</td>
                  <td>${data.status_str}</td>
              </tr>
          `)
        })
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal mendapatkan data'
        })
        console.log(data);
      }
    });
  }
  
  const formal = (id) => {
    $.ajax({
      url: '<?= base_url() ?>pengaturan/profile/getFormal',
      data: {
        idp: id
      },
      type: 'post',
      success: function (data) {
        data = data.data;
        $('#tbl-head-formal').html(`
            <tr>
              <th>Peristiwa Formal</th>
              <th>Tanggal</th>
              <th>Tempat</th>
              <th>Status</th>
            </tr>
        `);
        $('#tbl-body-formal').html('');
        data.forEach((data) => {
          $('#tbl-body-formal').append(`
              <tr>
                  <td>${data.peristiwa}</td>
                  <td>${data.tanggal_data_formal}</td>
                  <td>${data.tempat}</td>
                  <td>${data.status_str}</td>
              </tr>
          `)
        })
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal mendapatkan data'
        })
        console.log(data);
      }
    });
  }
  
  const education = (id) => {
    $.ajax({
      url: '<?= base_url() ?>pengaturan/profile/getEducation',
      data: {
        idp: id
      },
      type: 'post',
      success: function (data) {
        data = data.data;
        $('#tbl-head-education').html(`
            <tr>
              <th>Gelar</th>
              <th>Tanggal Lulus</th>
              <th>Lembaga</th>
              <th>Status</th>
            </tr>
        `);
        $('#tbl-body-education').html('');
        data.forEach((data) => {
          $('#tbl-body-education').append(`
              <tr>
                  <td>${data.nama}</td>
                  <td>${data.tanggal_lulus}</td>
                  <td>${data.lembaga}</td>
                  <td>${data.status_str}</td>
              </tr>
          `)
        })
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal mendapatkan data'
        })
        console.log(data);
      }
    });
  }
  
  const membership = (id) => {
    $.ajax({
      url: '<?= base_url() ?>pengaturan/profile/getMembership',
      data: {
        idp: id
      },
      type: 'post',
      success: function (data) {
        data = data.data;
        $('#tbl-head-membership').html(`
            <tr>
              <th>Jenis Membership</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
        `);
        $('#tbl-body-membership').html('');
        data.forEach((data) => {
          $('#tbl-body-membership').append(`
              <tr>
                  <td>${data.nama}</td>
                  <td>${data.tanggal}</td>
                  <td>${data.status_str}</td>
              </tr>
          `)
        })
      },
      error: function (data) {
        Toast.fire({
          icon: 'error',
          title: 'Gagal mendapatkan data'
        })
        console.log(data);
      }
    });
  }
  