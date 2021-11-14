var Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});

function setBtnLoading(element, text, status = true) {
	const el = $(element);
	if (status) {
		el.attr("disabled", "");
		el.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ${text}`);
	} else {
		el.removeAttr("disabled");
		el.html(text);
	}
}

function ajax_select_kode(btn = { id: '', pretext: '', text: '' }, select, url, data = null, modal = false, initial_select = false, selected = '', method = 'post') {
	if (btn == false) {
		setBtnLoading(btn.id, btn.pretext);
	}
	$.ajax({
		method: 'post',
		url: url,
		data: data
	}).done((data) => {
		const init_select = initial_select != false ? `<option value="">${initial_select}</option>` : '';
		// console.log(init_select);
		$(select).html('');
		let html = init_select;
		data.forEach(e => {
			const select = e.id == selected ? 'selected' : '';
			html += `<option value="${e.id}" ${select}>${e.kode} - ${e.text}</option>`;
		});
		$(select).html(html);
		$(modal).modal('toggle');
	}).fail(($xhr) => {
		Toast.fire({
			icon: 'error',
			title: 'Gagal mendapatkan data.'
		})
	}).always(() => {
		if (btn == false) {
			setBtnLoading(btn.id, btn.text, false);
		}
	})
}

function ajax_select(btn = { id: '', pretext: '', text: '' }, select, url, data = null, modal = false, initial_select = false, selected = '', method = 'post') {
	if (btn == false) {
		setBtnLoading(btn.id, btn.pretext);
	}
	$.ajax({
		method: 'post',
		url: url,
		data: data
	}).done((data) => {
		const init_select = initial_select != false ? `<option value="">${initial_select}</option>` : '';
		// console.log(init_select);
		$(select).html('');
		let html = init_select;
		data.forEach(e => {
			const select = e.id == selected ? 'selected' : '';
			html += `<option value="${e.id}" ${select}>${e.text}</option>`;
		});
		$(select).html(html);
		$(modal).modal('toggle');
	}).fail(($xhr) => {
		Toast.fire({
			icon: 'error',
			title: 'Gagal mendapatkan data.'
		})
	}).always(() => {
		if (btn == false) {
			setBtnLoading(btn.id, btn.text, false);
		}
	})
}

function format_rupiah(angka, format = 2, prefix) {
	angka = angka != "" ? angka : 0;
	angka = parseFloat(angka);
	angka_ = angka.toString().split('.');
	if (format) {
		if (angka_[1]) {
			const len = String(angka_[1]).length;

			angka = angka.toFixed(format > len ? len : format);
		}
	}
	const minus = angka < 0 ? "-" : "";
	angka = angka.toString().split('.');
	let suffix = angka[1] ? angka[1] : '';

	angka = angka[0];
	if (angka) {
		let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi)

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : ''
			rupiah += separator + ribuan.join('.')
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah

		// return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '')
		const result = prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
		return minus + result + (suffix != '' ? ',' + suffix : '');
	}
	else {
		return 0
	}
}