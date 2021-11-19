let tesss = null;
$(document).ready(function () {
  $('.rupiah').each(function () {
    this.innerHTML = `Rp. ${format_rupiah(this.innerText)}`;
  })

  function renderReview() {
    const ele = $('#review_container');
    ele.html(`
        <div class="d-flex justify-content-center align-items-center py-5">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        `);
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>produk/review/' + $('#slug').val(),
      data: null,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      ele.html('');
      data.forEach(e => {
        moment.defineLocale('id', {});
        const tanggal = moment(e.date, 'YYYY-MM-DD');
        const tanggal_str = tanggal.format('dddd, DD MMMM YYYY');
        ele.append(`
                    <div class="pro_review mb-5">
                      <div class="review_thumb">
                        <img alt="review images" src="<?= base_url() ?>assets/images/review/1.jpg">
                      </div>
                      <div class="review_details">
                        <div class="review_info mb-2">
                          <h5>${e.name} - <span> ${tanggal_str}</span></h5>
                        </div>
                        <p>${e.description}</p>
                      </div>
                    </div>
        `);
      });
    }).fail(($xhr) => {
      ele.html('');
    })
  }
  if (review == 1) {
    renderReview();
  }

  $("#freview").submit(function (ev) {
    ev.preventDefault();
    const form = new FormData(this);
    const btn = $('#btn-submit');
    $('#btn-submit').attr('disabled', '');
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>produk/review_store',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
    }).done((data) => {
      $('#name').val('');
      $('#email').val('');
      $('#description').val('');
      renderReview();
      $('#alert_area').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Sukses</strong> Review Berhasil dikirim.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
      `);
    }).fail(($xhr) => {
      $('#alert_area').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Gagal</strong> ${$xhr.responseJSON.message}.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
      `);
    }).always(() => {
      $('#btn-submit').removeAttr('disabled');
    })
  });
})

