$(document).ready(function() {
	//Halaman Schedule
	$('.btn_ubahschedule').click(function(){
		var dept = new Date($(this).data('tanggal'));
		var eta = new Date($(this).data('eta'));
		var currentDate = dept.toISOString().substring(0,10);
		var currentTime = eta.toISOString().substring(11,16);

		document.getElementById('edittdeptime').value = currentDate;
		document.getElementById('editeta').value = currentTime;

		$('#formeditschedule').modal('show');
		$('#editid').val($(this).data('id'));
		$('#editjenisbus').val($(this).data('busid'));
		$('#editfrom').val($(this).data('fromid'));
		$('#editto').val($(this).data('toid'));
		$('#edittdeptime').val($(this).data('tanggal'));
		$('#editeta').val($(this).data('eta'));
		$('#editavail').val($(this).data('avail'));
		$('#editprice').val($(this).data('price'));
	});

	$('.btn_deleteschedule').click(function(){
		$('#formdeleteschedule').modal('show');
		$('#delidschedule').val($(this).data('id'));
	});
	
	//Halaman Manager
	$('.btn_ubahmanager').click(function(){
		$('#formeditmanager').modal('show');
		$('#editid').val($(this).data('id'));
		$('#editname').val($(this).data('name'));
		$('#editjk').val($(this).data('jk'));
		$('#editalamat').val($(this).data('alamat'));
		$('#editemail').val($(this).data('email'));
		$('#editnotelp').val($(this).data('telp'));
		$('#editusername').val($(this).data('username'));
		$('#editstatus').val($(this).data('status'));
	});

	$('.btn_deletemanager').click(function(){
		$('#formdeletemanager').modal('show');
		$('#delidmanager').val($(this).data('id'));
	});

	//Halaman Bus
	$('.btn_ubahloc').click(function(){
		$('#formeditloc').modal('show');
		$('#editid').val($(this).data('id'));
		$('#editterminal_name').val($(this).data('name'));
		$('#editcity').val($(this).data('city'));
		$('#editstate').val($(this).data('state'));
		$('#editstatus').val($(this).data('status'));
	});

	$('.btn_deleteloc').click(function(){
		$('#formdeleteloc').modal('show');
		$('#delidloc').val($(this).data('id'));
	});

	//Halaman location
	$('.btn_ubahbus').click(function(){
		$('#formeditbus').modal('show');
		$('#editid').val($(this).data('id'));
		$('#editname').val($(this).data('name'));
		$('#editsifat').val($(this).data('sifat'));
		$('#editplatnomor').val($(this).data('plat'));
		$('#editnomesin').val($(this).data('nomesin'));
		$('#editpabrikan').val($(this).data('pabrikan'));
		$('#editbusnumber').val($(this).data('busnumber'));
		$('#editstatus').val($(this).data('status'));
	});

	$('.btn_deletebus').click(function(){
		$('#formdeletebus').modal('show');
		$('#delidbus').val($(this).data('id'));
	});

	//Halaman Admin
	$('.btn_ubahadmin').click(function(){
		$('#formeditadmin').modal('show');
		$('#editidadmin').val($(this).data('id'));
		$('#editnamalengkap').val($(this).data('nama'));
		$('#editjk').val($(this).data('jk'));
		$('#editnotelp').val($(this).data('telp'));
		$('#editusername').val($(this).data('username'));
		$('#editpassword').val($(this).data('pass'));
		$('#editalamat').val($(this).data('alamat'));
	});

	$('.btn_deleteadmin').click(function(){
		$('#formdeleteadmin').modal('show');
		$('#delidadmin').val($(this).data('id'));
	});

	//Halaman User
	$('.btn_ubahuser').click(function(){
		$('#formedituser').modal('show');
		$('#editiduser').val($(this).data('id'));
		$('#editnamalengkap').val($(this).data('nama'));
		$('#editjk').val($(this).data('jk'));
		$('#editnotelp').val($(this).data('telp'));
		$('#editusername').val($(this).data('username'));
		$('#editpassword').val($(this).data('pass'));
		$('#editalamat').val($(this).data('alamat'));
	});

	$('.btn_deleteuser').click(function(){
		$('#formdeleteuser').modal('show');
		$('#deliduser').val($(this).data('id'));
	});

	//Halaman Wisata
	$('.btn_ubahwisata').click(function(){
		$('#currentfoto').attr('src', $(this).data('foto'));
		$('#formeditwisata').modal('show');
		$('#editidwisata').val($(this).data('id'));
		$('#editnamawisata').val($(this).data('nama'));
		$('#editketerangan').val($(this).data('ket'));
	});

	$('.btn_deletewisata').click(function(){
		$('#formdeletewisata').modal('show');
		$('#delidwisata').val($(this).data('id'));
	});

	// Halaman Jabatan
	$('.tombolTambahJabatan').click(function() {
		$('#formModalLabelJabatan').html('Tambah Data Jabatan');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_jabatan').val('');
		$('#jabatan').val('');
		$('#gapok').val('');
		$('#tj_transport').val('');
		$('#uang_makan').val('');
	});

	$('.tombolUbahJabatan').click(function() {
		$('#formModalLabelJabatan').html('Ubah Data Jabatan');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/penggajian-ci-3/admin/jabatan/ubahjabatan');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/penggajian-ci-3/admin/jabatan/getjabatan',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				console.log(data);
				$('#jabatan').val(data.nama_jabatan);
				$('#gapok').val(data.gaji_pokok);
				$('#tj_transport').val(data.tj_transport);
				$('#uang_makan').val(data.uang_makan);
			}
		})
	});
	// Akhir Halaman Jabatan


	// Halaman Pegawai
	$('.tombolTambahPegawai').click(function() {
		$('#formModalLabelJabatan').html('Tambah Data Pegawai');
		$('.modal-footer button[type=submit]').html('Tambah');

		$('#id_pegawai').val('');
		$('#nama_pegawai').val('');
		$('#nama_jabatan').val('');
		$('#nik').val('');
		$('#jk').val('');
		$('#tgl_masuk').val('');
		$('#status').val('');
		$('#editTampilPhoto').attr('src', '');
		$('#photoLama').val('');
	});

	$('.tombolUbahPegawai').click(function() {
		console.log('ubah ');
		$('#formModalubahPegawai').modal("show");
		$('#formModalLabelPegawai').html('Ubah Data Pegawai');
		$('.modal-footer button[type=submit]').html('Ubah');

		const id = $(this).data('id');
		console.log(id);

		$('.id_pegawai').val(id);
		$('.nama_pegawai').val($(this).data('nama')); 	
		$('.nik').val($(this).data('nik'));
		$('.jk').val($(this).data('jk'));
		$('.tgl_masuk').val($(this).data('tglmasuk'));
		$('.status').val($(this).data('stts'));
		$('.gaji_pokok').val($(this).data('gapok'));
		$('.editTampilPhoto').attr('src', 'http://localhost/penggajian-ci-3/assets/img/user/' + $(this).data('poto'));
		$('.photoLama').val($(this).data('poto'));


		$.ajax({
			url: 'http://localhost/penggajian-ci-3/admin/pegawai/getpegawai',
			method: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				console.log(data);
				$('#id_pegawai').val(data.id_pegawai);
				$('#nama_pegawai').val(data.nama_pegawai); 	
				$('#nik').val(data.nik);
				$('#jk').val(data.jk_pegawai);
				$('#tgl_masuk').val(data.tgl_masuk);
				$('#status').val(data.status);
				$('#gaji_pokok').val(data.gaji_pokok);
				$('#editTampilPhoto').attr('src', 'http://localhost/penggajian-ci-3/assets/img/user/' + data.photo);
				$('#photoLama').val(data.photo);
			}
		})
	});
	// Akhir Halaman Pegawai


	// Halaman Potongan Gaji
	$('.tombolTambahPotonganGaji').click(function() {
		$('#formModalLabelPotonganGaji').html('Tambah Data Potongan');
		$('.modal-footer button[type=submit]').html('Tambah');

	});

	$('.tombolUbahPotonganGaji').click(function() {
		$('#formModalLabelPotonganGaji').html('Ubah Data Potongan');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/penggajian-ci-3/admin/potongangaji/ubahpotongan');

		const id = $(this).data('id');
		// console.log(id);

		$.ajax({
			url: 'http://localhost/penggajian-ci-3/admin/potongangaji/getpotongan',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data) {
				console.log(data);
				$('#id_poga').val(data.id_poga);
				$('#potongan').val(data.potongan);
				$('#jml').val(data.jml_potongan);
			}
		})
	});
	// Akhir Halaman Potongan Gaji

});