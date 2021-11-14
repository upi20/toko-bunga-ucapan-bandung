$(() => {

	const initAjax = () => {
		$.ajaxSetup({
			accepts: ['application/json'],
			dataType: 'json'
		})
	}

	window.apiClient =
	{
		login:
		{

			cekLogin(username, password) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>login/doLogin',
					data:
					{
						username: username,
						password: password
					}
				})
			}

		},
		pengaturanLevel:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/insert',
					data:
					{
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/update',
					data:
					{
						id: id,
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/delete',
					data:
					{
						id: id
					}
				})
			},
			deleteHakAkses(level, menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/HakAksesLevel/delete',
					data:
					{
						level: level,
						menu: menu
					}
				})
			},
			insertHakAkses(level, menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/HakAksesLevel/insert',
					data:
					{
						level: level,
						menu: menu
					}
				})
			}

		},
		pengaturanMenu:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/insert',
					data:
					{
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/update',
					data:
					{
						id: id,
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/delete',
					data:
					{
						id: id
					}
				})
			},

		},
		pengaturanHakAkses:
		{

			subMenu(menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/subMenu',
					data:
					{
						menu: menu
					}
				})
			},

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(level, menu, sub_menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/insert',
					data:
					{
						level: level,
						menu: menu,
						sub_menu: sub_menu
					}
				})
			},

			update(id, level, menu, sub_menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/update',
					data:
					{
						id: id,
						level: level,
						menu: menu,
						sub_menu: sub_menu
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/hakAkses/delete',
					data:
					{
						id: id
					}
				})
			},

		},
		pengaturanPengguna:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/insert',
					data:
					{
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			update(id, level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/update',
					data:
					{
						id: id,
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/delete',
					data:
					{
						id: id
					}
				})
			},

		},
		pengaturanLaporan: {
			get() {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/laporan/getdata',
					data: {}
				})
			},
			set(kepala_sekolah, nip_kepala_sekolah, pemegang_kas, nip_pemegang_kas, kota) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/laporan/setdata',
					data: {
						kepala_sekolah: kepala_sekolah,
						nip_kepala_sekolah: nip_kepala_sekolah,
						pemegang_kas: pemegang_kas,
						nip_pemegang_kas: nip_pemegang_kas,
						kota: kota
					}
				})
			}
		},
		format:
		{

			number(angka, prefix) {
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
					return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '')
				}
				else {
					return 0
				}
			},

			splitString(stringToSplit, separator) {
				let arrayOfStrings = stringToSplit.split(separator)

				return arrayOfStrings.join('')
			},

			terbilang(nilai) {
				var bilangan = nilai
				var kalimat = ""
				var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')
				var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan')
				var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun')
				var panjang_bilangan = bilangan.length

				// panjang_bilangan = 14
				/* pengujian panjang bilangan */
				if (panjang_bilangan > 15) {
					kalimat = "Diluar Batas"
				}
				else {
					/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
					for (i = 1; i <= panjang_bilangan; i++) {
						angka[i] = bilangan.substr(-(i), 1)
					}

					var i = 1
					var j = 0

					/* mulai proses iterasi terhadap array angka */
					while (i <= panjang_bilangan) {
						subkalimat = ""
						kata1 = ""
						kata2 = ""
						kata3 = ""

						/* untuk Ratusan */
						if (angka[i + 2] != "0") {
							if (angka[i + 2] == "1") {
								kata1 = "Seratus"
							}
							else {
								kata1 = kata[angka[i + 2]] + " Ratus"
							}
						}

						/* untuk Puluhan atau Belasan */
						if (angka[i + 1] != "0") {
							if (angka[i + 1] == "1") {
								if (angka[i] == "0") {
									kata2 = "Sepuluh"
								}
								else if (angka[i] == "1") {
									kata2 = "Sebelas"
								}
								else {
									kata2 = kata[angka[i]] + " Belas"
								}
							}
							else {
								kata2 = kata[angka[i + 1]] + " Puluh"
							}
						}

						/* untuk Satuan */
						if (angka[i] != "0") {
							if (angka[i + 1] != "1") {
								kata3 = kata[angka[i]]
							}
						}

						/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
						if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
							subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " "
						}

						/* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
						kalimat = subkalimat + kalimat
						i = i + 3
						j = j + 1
					}

					/* mengganti Satu Ribu jadi Seribu jika diperlukan */
					if ((angka[5] == "0") && (angka[6] == "0")) {
						kalimat = kalimat.replace("Satu Ribu", "Seribu")
					}
				}

				return kalimat
			},
			format_ringgit(angka, format = 2, prefix) {
				angka = angka != "" ? angka : 0;
				angka = parseFloat(angka);
				const minus = angka < 0 ? "-" : "";
				angka = angka.toString().split('.');
				let suffix = angka[1] ? '.' + angka[1] : '';
				if (format) {
					let str = '';
					for (let i = 0; i <= format; i++) {
						const suffix_1 = suffix[i] ? suffix[i] : '';
						str = `${str}${suffix_1}`;
					}
					suffix = str;
				}

				angka = angka[0];
				if (angka[0]) {
					let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
						split = number_string.split(','),
						sisa = split[0].length % 3,
						rupiah = split[0].substr(0, sisa),
						ribuan = split[0].substr(sisa).match(/\d{3}/gi)

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if (ribuan) {
						separator = sisa ? ',' : ''
						rupiah += separator + ribuan.join(',')
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah
					const result = prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '')
					return minus + result + suffix;
				}
				else {
					return 0
				}
			},
			format_rupiah(angka, format = 2, prefix) {
				angka = angka != "" ? angka : 0;
				angka = parseFloat(angka);
				const minus = angka < 0 ? "-" : "";
				angka = angka.toString().split('.');
				let suffix = angka[1] ? '.' + angka[1] : '';

				if (format) {
					let str = '';
					for (let i = 0; i <= format; i++) {
						const suffix_1 = suffix[i] ? suffix[i] : '';
						str = `${str}${suffix_1}`;
					}
					suffix = str;
				}

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
					const result = prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
					return minus + result + suffix;
				}
				else {
					return 0
				}
			}
		},
		component: {
			disabled(id, disabled = true) {
				if (disabled) {
					$("#" + id).attr("disabled", "");
				} else {
					$("#" + id).removeAttr("disabled");
				}
			},
			hidden(id, hidden = true) {
				if (hidden) {
					$("#" + id).attr("style", "display:none");
				} else {
					$("#" + id).removeAttr("style");
				}
			}
		}
	}

	initAjax()
})