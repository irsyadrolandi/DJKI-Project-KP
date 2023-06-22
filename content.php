

<?php
// panggil file database.php untuk koneksi ke database
error_reporting(0);
require_once "config/database.php";
// panggil fungsi untuk format tanggal
require_once "config/fungsi_tanggal.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih customer, panggil file view customer
	elseif ($_GET['module']=='view_admin') {
		include "modules/customer/view_admin.php";
	}


	// jika halaman konten yang dipilih customer, panggil file view customer
	elseif ($_GET['module']=='form') {
		include "modules/kos/form.php";
	}


		elseif ($_GET['module']=='form_tiket') {
		include "modules/tiket/form.php";
	}


elseif ($_GET['module']=='tiket') {
		include "modules/tiket/view.php";
	}


elseif ($_GET['module']=='user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module']=='form_user') {
		include "modules/user/form.php";
	}


	elseif ($_GET['module']=='report') {
		include "modules/tiket/report.php";
	}


	elseif ($_GET['module']=='tiket_list') {
		include "modules/tiket/view_list.php";
	}





}
?>