const profile_id = $("#id").val();
let tabelHapus = '';
membership_check = true;
const table_length = new Map();
table_length.set('alamat', 0);
table_length.set('membership', 0);
table_length.set('formal', 0);
table_length.set('education', 0);
table_length.set('kontak', 0);
$(document).ready(() => {

  $("#membership_jenis").select2();
  $("#peristiwa_formal").select2();
  $("#id_partner").select2();
  $("#id_level").select2();
  $("#jenis_alamat").select2();
  $("#tipe_kontak").select2();
  $("#nama").select2();
  $("#email").change(function () {
    emailCheck(this);
  })
  $("#nik").change(function () {
    nikCheck(this);
  })

  $("#membership_jenis").change(function () {
    if (this.value == '' || !membership_check) {
      membership_check = true;
      return;
    }
    membershipCheck(this);
  })



  // table
  // buat ulang tabel contact
  // function tblContact(data) {
  //   data = data.data
  //   $('#tblContact').html(`
  //       <thead>
  //           <tr>
  //               <th>Jenis Kontak</th>
  //               <th>Nilai Kontak</th>
  //           </tr>
  //       </thead>
  //       <tbody>
  //           <tr>
  //               <td>Telepon</td>
  //               <td>${data[0]['no_telepon']}</td>
  //           </tr>
  //           <tr>
  //               <td>Instagram</td>
  //               <td>${data[0]['instagram']}</td>
  //           </tr>
  //           <tr>
  //               <td>Youtube</td>
  //               <td>${data[0]['youtube']}</td>
  //           </tr>
  //           <tr>
  //               <td>LinkedIn</td>
  //               <td>${data[0]['linkedin']}</td>
  //           </tr>
  //       </tbody>
  //       `)
  // }

  // tabel Alamat
  function tblAlamat() {
    const idp = $("#id").val()
    const table_html = $('#tblalamat');
    table_html.dataTable().fnDestroy()
    table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>pengaturan/profile/getAlamat/",
        "data": { idp: idp },
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "lengthChange": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "columns": [
        { "data": "jenis_alamat" },
        { "data": "domisili" },
        { "data": "alamat" },
        { "data": "tanggal_mulai" },
        { "data": "tanggal_selesai" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
                <button type="button" class="btn btn-primary btn-xs" onclick="ubah_alamat(${data})">
                  <i class="fa fa-edit"></i> Ubah
                </button>
                <button  type="button"  class="btn btn-danger btn-xs" onclick="Hapus(${data},'alamat')">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </div>`
          }, className: "nowrap"
        }
      ],
      "initComplete": function (settings, json) {
        table_length.set('alamat', json.data.length);
      }
    });
  }

  // table formal
  function tblFormal() {
    const idp = $("#id").val()
    const table_html = $('#tblFormal');
    table_html.dataTable().fnDestroy()
    table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>pengaturan/profile/getFormal/",
        "data": { idp: idp },
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "lengthChange": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "columns": [
        { "data": "peristiwa" },
        { "data": "keterangan" },
        { "data": "tanggal_data_formal" },
        { "data": "tempat" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
              <button type="button"  class="btn btn-primary btn-xs" onclick="ubah_formal(${data})">
                <i class="fa fa-edit"></i> Ubah
              </button>
              <button type="button"  class="btn btn-danger btn-xs" onclick="Hapus(${data},'data_formal')">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </div>`
          }, className: "nowrap"
        }
      ],
      "initComplete": function (settings, json) {
        table_length.set('formal', json.data.length);
      }
    });
  }

  // tabel education
  function tblEducation() {
    const idp = $("#id").val()
    const table_html = $('#tblEducation');
    table_html.dataTable().fnDestroy()
    table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>pengaturan/profile/getEducation/",
        "data": { idp: idp },
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "lengthChange": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "columns": [
        { "data": "nama" },
        { "data": "tanggal_lulus" },
        { "data": "lembaga" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
              <button type="button" class="btn btn-primary btn-xs" onclick="ubah_education(${data})">
                <i class="fa fa-edit"></i> Ubah
              </button>
              <button type="button" class="btn btn-danger btn-xs" onclick="Hapus(${data},'gelar')">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </div>`
          }, className: "nowrap"
        }
      ],
      "initComplete": function (settings, json) {
        table_length.set('education', json.data.length);
      }
    });
  }

  // tabel membership
  function tblMembership() {
    const idp = $("#id").val()
    const table_html = $('#tblmembership  ');
    table_html.dataTable().fnDestroy()
    table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>pengaturan/profile/getMembership/",
        "data": { idp: idp },
        "type": 'POST'
      },
      "pageLength": 10,
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "columns": [
        { "data": "nama" },
        { "data": "tanggal" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            const btn_active = full.status == 2 ? `
            <button type="button"
            class="btn btn-info btn-xs"
            data-id_profile="${idp}"
            data-id="${data}"
            data-title="${full.nama}"
            onclick="set_active_membership(this)">
              <i class="fa fa-key"></i> Aktifkan
            </button>
            `: '';
            const btn_delete = full.status == 2 ? `
              <button type="button" class="btn btn-danger btn-xs" onclick="Hapus(${data},'membership')">
                <i class="fa fa-trash"></i> Hapus
              </button>
            ` : '';
            return `<div class="pull-right">
              ${btn_active}
              <button type="button" class="btn btn-primary btn-xs"
              data-id="${full.id}"
              data-id_jenis="${full.id_jenis}"
              data-status="${full.status}"
              data-tanggal="${full.tanggal}"
              onclick="ubah_membership(this)">
                <i class="fa fa-edit"></i> Ubah
              </button>
              ${btn_delete}
            </div>`
          }, className: "nowrap"
        }
      ],
      "initComplete": function (settings, json) {
        table_length.set('membership', json.data.length);
      }
    });
  }

  // tabel kontak
  function tblKontak() {
    const idp = $("#id").val()
    const table_html = $('#tblKontak');
    table_html.dataTable().fnDestroy()
    table_html.DataTable({
      "ajax": {
        "url": "<?= base_url()?>pengaturan/profile/getKontak/",
        "data": { idp: idp },
        "type": 'POST'
      },
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "lengthChange": true,
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "columns": [
        { "data": "tipe_kontak" },
        { "data": "keterangan" },
        { "data": "status_str" },
        {
          "data": "id", render(data, type, full, meta) {
            return `<div class="pull-right">
              <button type="button" class="btn btn-primary btn-xs" onclick="ubah_kontak(${data})">
                <i class="fa fa-edit"></i> Ubah
              </button>
              <button type="button" class="btn btn-danger btn-xs" onclick="Hapus(${data},'contact')">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </div>`
          }, className: "nowrap"
        }
      ],
      "initComplete": function (settings, json) {
        table_length.set('kontak', json.data.length);
      }
    });
  }

  // inital table
  tblAlamat();
  tblFormal();
  tblEducation();
  tblMembership();
  tblKontak();

  // form
  // tambah dan ubah
  $("#fcontact").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_contact").val() == "" ? 'insert_contact' : 'update_contact'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      // tblContact(data);
      tblAlamat();
      tblFormal();
      tblEducation();
      tblKontak();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#contact').modal('toggle')
    })
  });

  $("#btn-lalamat").click(() => {
    $('#id_contact').val("");
    // $('#id_profile').val("");
    $('#jenis_alamat').val("");
    $('#alamat').val("");
    $('#domisili').val("");
    $('#tanggal_mulai').val("");
    $('#tanggal_selesai').val("");
    $('#status').val("1");
  });

  $("#btn-formal").click(() => {
    $('#id_alamat').val("");
    $('#peristiwa_formal').val("");
    $('#tanggal_data_formal').val("");
    $('#tempat').val("");
    $('#statusf').val("1");
  });

  $("#btn-education").click(() => {
    $('#id_education').val("");
    $('#nama').val("");
    $('#tanggal_lulus').val("");
    $('#lembaga').val("");
    $('#statuse').val("1");
  });

  $("#btn-membership").click(() => {
    $('#id_membership').val("");
    $('#membership_tanggal').val("");
    $('#membership_status').val("1");
    $('#membership_jenis').val('').trigger('change');
  });

  $("#btn-kontak").click(() => {
    $('#id_contact').val("");
    $('#tipe_kontak').val("");
    $('#keterangan').val("");
    $('#statusk').val("1");
  });


  $("#main-form").submit(function (ev) {

    ev.preventDefault();
    // validasi datatable
    // if (table_length.get('alamat') < 1) {
    //   Toast.fire({
    //     icon: 'error',
    //     title: 'Alamat belum di isi'
    //   })
    //   return;
    // }

    // if (table_length.get('membership') < 1) {
    //   Toast.fire({
    //     icon: 'error',
    //     title: 'Membership belum di isi'
    //   })
    //   return;
    // }

    // if (table_length.get('formal') < 1) {
    //   Toast.fire({
    //     icon: 'error',
    //     title: 'Formal belum di isi'
    //   })
    //   return;
    // }

    // if (table_length.get('education') < 1) {
    //   Toast.fire({
    //     icon: 'error',
    //     title: 'Education belum di isi'
    //   })
    //   return;
    // }

    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/simpan',
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

  $("#falamat").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_alamat").val() == "" ? 'insert_alamat' : 'update_alamat'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      tblAlamat();
      $('#alamat').modal('hide')
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#alamat').modal('toggle')
    })
  });

  $("#fmembership_active").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/set_active_membersip',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      tblMembership();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#membership_active_modal').modal('toggle')
    })
  });

  $("#fmembership").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/' + ($('#id_membership').val() == "" ? 'insert_membership' : 'update_membership'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })
      tblMembership();
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#membership_modal').modal('toggle')
    })
  });

  $("#fformal").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_formal").val() == "" ? 'insert_formal' : 'update_formal'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })

      tblFormal();
      $('#formal').modal('hide')
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#formal').modal('toggle')
    })
  });

  $("#feducation").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    form.append('id_profile', $('#id').val())
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/' + ($("#id_education").val() == "" ? 'insert_education' : 'update_education'),
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil disimpan'
      })

      tblEducation();
      $('#education').modal('hide')
    }).fail(($xhr) => {
      Toast.fire({
        icon: 'error',
        title: 'Data gagal disimpan'
      })
    }).always(() => {
      $.LoadingOverlay("hide");
      $('#education').modal('toggle')
    })
  });

  // hapus
  $('#OkCheck').click(() => {
    let id = $("#idCheck").val()
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>pengaturan/profile/hapusDaftar',
      data: {
        id: id,
        tbl: tabelHapus
      }
    }).done((data) => {
      Toast.fire({
        icon: 'success',
        title: 'Data berhasil dihapus'
      })
      tblAlamat();
      tblFormal();
      tblEducation();
      tblMembership();
      tblKontak();
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

function emailCheck(email_ele) {
  const email = $(email_ele);
  if (email.val() == '') {
    return;
  }

  email.attr('readonly', '')
  $.ajax({
    url: '<?= base_url() ?>pengaturan/profile/emailCheck',
    data: {
      id_user: global_id_user,
      email: email.val()
    },
    type: 'post',
    success: function (data) {
      Toast.fire({
        icon: 'success',
        title: 'Success Email Belum Terdaftar'
      })
    },
    error: function (data) {
      Toast.fire({
        icon: 'error',
        title: data.responseJSON.message
      })
      email.val('');
      email.focus();
    },
    complete: function () {
      email.removeAttr('readonly');
    }
  });
}

function nikCheck(nik_ele) {
  const nik = $(nik_ele);
  if (nik.val() == '') {
    return;
  }

  nik.attr('readonly', '')
  $.ajax({
    url: '<?= base_url() ?>pengaturan/profile/nikCheck',
    data: {
      id_user: global_id_user,
      nik: nik.val()
    },
    type: 'post',
    success: function (data) {
      Toast.fire({
        icon: 'success',
        title: 'Success Nik Belum Terdaftar'
      })
    },
    error: function (data) {
      Toast.fire({
        icon: 'error',
        title: data.responseJSON.message
      })
      nik.val('');
      nik.focus();
    },
    complete: function () {
      nik.removeAttr('readonly');
    }
  });
}

function membershipCheck(membership_ele) {
  const membership = $(membership_ele);
  if (membership.val() == '') {
    return;
  }

  membership.attr('readonly', '')
  $.ajax({
    url: '<?= base_url() ?>pengaturan/profile/membershipCheck',
    data: {
      id_profile: profile_id,
      id_jenis: membership.val()
    },
    type: 'post',
    success: function (data) {
      Toast.fire({
        icon: 'success',
        title: 'Success Jenis Membership Belum Terdaftar'
      })
    },
    error: function (data) {
      Toast.fire({
        icon: 'error',
        title: data.responseJSON.message
      })
      membership.val('').trigger('change');
      membership.focus();
    },
    complete: function () {
      membership.removeAttr('readonly');
    }
  });
}

// Click Hapus
const Hapus = (id, tbl) => {
  $("#idCheck").val(id)
  tabelHapus = tbl
  $("#LabelCheck").text('Form Hapus')
  $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
  $('#ModalCheck').modal('toggle')
}

const ubah_kontak = (id) => {
  const idp = $("#id").val()
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/getContact',
    data: {
      id: id
    }
  }).done((data) => {
    if (data.data) {
      data = data.data[0];
      $("#myModalLabel").text("Ubah Contact");
      $('#id_contact').val(data.id);
      $('#tipe_kontak').val(data.id_tipe_kontak);
      $('#keterangan').val(data.keterangan);
      $('#statusk').val(data.status);
      $('#contact').modal('toggle')
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Data tidak valid.'
      })
    }
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mendapatkan data.'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}

// Click Ubah
const ubah_contact = (id) => {
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/getContact',
    data: {
      id: id
    }
  }).done((data) => {
    if (data.data) {
      data = data.data[0];
      $("#myModalLabel").text("Ubah Contact");
      $('#id_contact').val(data.id);
      $('#no_telepon').val(data.no_telepon);
      $('#instagram').val(data.instagram);
      $('#youtube').val(data.youtube);
      $('#linkedin').val(data.linkedin);
      $('#contact').modal('toggle')
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Data tidak valid.'
      })
    }
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mendapatkan data.'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}

const ubah_alamat = (id) => {
  const idp = $("#id").val()
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/getAlamat',
    data: {
      idp: idp,
      id: id
    }
  }).done((data) => {
    if (data.data) {
      data = data.data[0];
      $("#myModalLabel").text("Ubah Alamat");
      $('#id_alamat').val(data.id);
      $('#jenis_alamat').val(data.id_jenis_alamat);
      $('#alamat').val(data.alamat);
      $('#domisili').val(data.domisili);
      $('#tanggal_mulai').val(data.tanggal_mulai);
      $('#tanggal_selesai').val(data.tanggal_selesai);
      $('#status').val(data.status);
      $('#alamat').modal('toggle')
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Data tidak valid.'
      })
    }
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mendapatkan data.'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}

const ubah_formal = (id) => {
  const idp = $("#id").val()
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/getFormal',
    data: {
      idp: idp,
      id: id
    }
  }).done((data) => {
    if (data.data) {
      data = data.data[0];
      $("#myModalLabel").text("Ubah Formal");
      $('#id_formal').val(data.id);
      $('#peristiwa_formal').val(data.peristiwa_formal);
      $('#tempat').val(data.tempat);
      $('#peristiwa_formal').val(data.dtm_peristiwa_id).trigger('change');
      $('#peristiwa_keterangan').val(data.keterangan);
      $('#tanggal_data_formal').val(data.tanggal_data_formal);
      $('#statusf').val(data.status);
      $('#formal').modal('toggle')
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Data tidak valid.'
      })
    }
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mendapatkan data.'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}

const ubah_education = (id) => {
  const idp = $("#id").val()
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/getEducation',
    data: {
      idp: idp,
      id: id
    }
  }).done((data) => {
    if (data.data) {
      data = data.data[0];
      $("#myModalLabel").text("Ubah Education");
      $('#id_education').val(data.id);
      $('#nama').val(data.id_jenis_gelar);
      $('#tanggal_lulus').val(data.tanggal_lulus);
      $('#lembaga').val(data.lembaga);
      $('#statuse').val(data.status);
      $('#education').modal('toggle')
    } else {
      Toast.fire({
        icon: 'error',
        title: 'Data tidak valid.'
      })
    }
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mendapatkan data.'
    })
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}

const ubah_membership = (datas) => {
  const data = datas.dataset;
  $("#membership_modal").modal('toggle');
  $('#id_membership').val(data.id);
  $('#membership_tanggal').val(data.tanggal);
  $('#membership_status').val(data.status);
  membership_check = false;
  $('#membership_jenis').val(data.id_jenis).trigger('change');
}

const set_active_membership = (datas) => {
  const data = datas.dataset;
  $("#membership_active_modal").modal('toggle');
  $("#id_membership_active").val(data.id);
  $("#membership_active_name").val(data.title);
}

function photo_preview(datas) {
  const data = datas.dataset;
  const img = $("#foto-preview");
  $("#fot_preview").modal('toggle');
  img.attr('src', `<?= base_url() ?>files/profile/${data.src}`);
  img.attr('alt', data.alt);
}

function konfirmasiEmail(datas) {
  const data = datas.dataset;
  $(datas).attr('disabled', '');
  $.LoadingOverlay("show");
  $.ajax({
    method: 'post',
    url: '<?= base_url() ?>pengaturan/profile/sendEmailConfirm',
    data: {
      id: data.id,
      email: data.email
    }
  }).done((data) => {
    Toast.fire({
      icon: 'success',
      title: 'Email konfirmasi berhasil dikirim'
    })
    $(datas).text(`Email konfirmasi terkirim ke: ${datas.dataset.email}`);
  }).fail(($xhr) => {
    Toast.fire({
      icon: 'error',
      title: 'Gagal mengirim email'
    })
    $(datas).removeAttr('disabled', '');
  }).always(() => {
    $.LoadingOverlay("hide");
  })
}