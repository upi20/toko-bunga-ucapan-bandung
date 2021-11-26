$(document).ready(() => {
  $('.summernote').summernote({
    toolbar: [
      ['fontsize', ['fontsize']], ['fontname', ['fontname']], ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['color', ['color']], ['float', ['floatLeft', 'floatRight', 'floatNone']], ['remove', ['removeMedia']], ['table', ['table']], ['insert', ['link', 'unlink', 'video', 'audio', 'hr']], ['mybutton', ['myVideo']], ['view', ['fullscreen', 'codeview']], ['help', ['help']]],
    height: (200),
  })
  $("#fmain").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/about/update`,
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
  $("#fhistory").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    $.LoadingOverlay("show");
    $.ajax({
      method: 'post',
      url: `<?= base_url() ?>admin/home/about/update_history`,
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
});

const view_gambar = (datas) => {
  $("#gambar_modal").modal('toggle');
  $("#img-view").attr('src', `<?= base_url() ?>/files/logo/${datas.dataset.foto}`)
}