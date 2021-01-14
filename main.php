<?php 

if ($_GET['module']=='') {
	include 'component/home.php';
	
}elseif ($_GET['module'] == 'pegawai') {
	if ($_SESSION['leveluser']=='admin'){
	include 'component/com_pegawai/pegawai.php';
	}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
	}
}elseif ($_GET['module'] == 'kelas') {
	include 'component/com_kelas/kelas.php';

}elseif ($_GET['module'] == 'input_aspirasi') {
	include 'component/com_aspirasi/input_aspirasi.php';

}elseif ($_GET['module'] == 'aspirasi_simpan') {
	include 'component/com_aspirasi/aspirasi_simpan.php';

}elseif ($_GET['module'] == 'aspirasi') {
	include 'component/com_aspirasi/aspirasi.php';

}elseif ($_GET['module'] == 'nasabah') {
	include 'component/com_nasabah/nasabah.php';

}elseif ($_GET['module'] == 'topup') {
	include 'component/com_topup/topup.php';

}elseif ($_GET['module'] == 'data_topup') {
	include 'component/com_topup/data_topup.php';

}elseif ($_GET['module'] == 'transfer') {
	include 'component/com_transfer/transfer.php';

}elseif ($_GET['module'] == 'transfer_aksi') {
	include 'component/com_transfer/transfer_aksi.php';

}elseif ($_GET['module'] == 'data_transfer') {
	include 'component/com_transfer/data_transfer.php';

}elseif ($_GET['module'] == 'konfirmasi') {
	include 'component/com_transfer/konfirmasi.php';

}elseif ($_GET['module'] == 'laporan_transaksi') {
	include 'component/com_nasabah_laporan/laporan_transaksi.php';

}elseif ($_GET['module'] == 'setting_kelas') {
	include 'component/com_setting_kelas/setting_kelas.php';

}elseif ($_GET['module'] == 'cari_nasabah') {
	include 'component/com_transaksi/cari_nasabah.php';

}elseif ($_GET['module'] == 'transaksi') {
	include 'component/com_transaksi/transaksi.php';

}elseif ($_GET['module'] == 'transaksi_aksi') {
	include 'component/com_transaksi/transaksi_aksi.php';

}elseif ($_GET['module'] == 'piutang') {
	include 'component/com_piutang/piutang.php';

}elseif ($_GET['module'] == 'laporan-transaksi') {
	include 'component/com_laporan/laporan-transaksi.php';

}elseif ($_GET['module'] == 'setoran_tunai') {
	include 'component/com_transaksi/setoran.php';

}elseif ($_GET['module'] == 'penarikan') {
	include 'component/com_transaksi/penarikan.php';

}elseif ($_GET['module'] == 'topupkantin') {
	include 'component/com_transaksi/topup.php';

}elseif ($_GET['module'] == 'cetak-rekening') {
	include 'component/com_rekening/rekening.php';

}elseif ($_GET['module'] == 'ubah_passwd') {
	include 'component/com_reset/ubah_passwd.php';

}elseif ($_GET['module'] == 'ubah_passwd_simpan') {
	include 'component/com_reset/ubah_passwd_simpan.php';

}elseif ($_GET['module'] == 'homeaksi') {
	include 'component/home_aksi.php';

}elseif ($_GET['module'] == 'pengaturan') {
	 if ($_SESSION['leveluser']=='admin'){
	include 'component/com_pengaturan/pengaturan.php';
	}else{
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
	}
}else{
	echo '<meta http-equiv="refresh" content="0; url=?module=beranda">';
}


?>