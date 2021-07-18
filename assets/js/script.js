$(function () {
	$('.tambah').on('click', function () {
		$('#addNewProduk').html('Tambah Produk');
		$('.modal-footer button[type=submit]').html('Tambah Produk');
		$('.modal-body form').attr('action', '/kerja/dashboard/produk');

		$('#id').val();
		$('#nama').val();
		$('#kategori').val();
		$('#ukuran').val();
		$('#harga').val();
		$('#deskripsi').val();
		$('#foto').val();
	});

	$('.edit').on('click', function () {
		$('#addNewProduk').html('Edit Produk');
		$('.modal-footer button[type=submit]').html('Edit Produk');

		const id = $(this).data('id');
		$('.modal-body form').attr('action', '/kerja/dashboard/edit/' + id);

		$.ajax({
			url: '/kerja/dashboard/fetch',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#nama').val(data.nama);
				$('#kategori').val(data.id_kategori);
				$('#ukuran').val(data.ukuran);
				$('#harga').val(data.harga);
				$('#deskripsi').val(data.deskripsi);
				$('#foto').val(data.foto);
			}
		});
	});
	$('.tC').on('click', function () {
		$('#addNewCategory').html('Tambah Kategori');
		$('.modal-footer button[type=submit]').html('Tambah Kategori');
		$('.modal-body form').attr('action', '/kerja/dashboard/kategori');

		$('#id').val();
		$('#kat').val();
	});

	$('.eC').on('click', function () {
		$('#addNewCategory').html('Edit Kategori');
		$('.modal-footer button[type=submit]').html('Edit Kategori');

		const id = $(this).data('id');
		$('.modal-body form').attr('action', '/kerja/dashboard/editk/' + id);

		$.ajax({
			url: '/kerja/dashboard/fetchk',
			data: {
				id,
				id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data.id);
				$('#kat').val(data.kategori);
			}
		});
	});
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass('selected').html(fileName);
	});
	$('.produk').on('click', function () {
		const id = $(this).data('id');
		const href = $(this).attr('href');

		$.ajax({
			url: "/kerja/home/popularitas",
			method: 'post',
			data: {
				id: id,
			},
			success: function () {
				document.location.href = href;
			}
		});
	});
});

const flashData = $('.flash-data').data('flashdata');
const flashData2 = $('.flashdata').data('flashdata');
const data = $('.flash-data').data('data');

if (flashData) {
	Swal.fire({
		title: data,
		text: 'Berhasil ' + flashData,
		type: 'success'
	})
}
if (flashData2) {
	Swal.fire({
		title: data,
		text: 'Belum ' + flashData2,
		type: 'warning'
	})
}

$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: data + ' akan dihapus',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
$('.logout').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Log Out',
		text: 'Apakah anda yakin ingin log out?',
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin',
		cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
