<?php

$page = $_GET['page'];
$aksi = $_GET['aksi'];



if ($page == "Data Pelanggan") {
	if ($aksi == "") {
		include "page/Data Pelanggan/pelanggan.php";
	}
	if ($aksi == "tambah") {
		include "page/Data Pelanggan/tambah.php";
	}
	if ($aksi == "ubah") {
		include "page/Data Pelanggan/ubah.php";
	}
	if ($aksi == "hapus") {
		include "page/Data Pelanggan/hapus.php";
	}
}
if ($page == "Data Outlet") {
	if ($aksi == "") {
		include "page/Data Outlet/outlet.php";
	}
	if ($aksi == "tambah") {
		include "page/Data Outlet/tambah.php";
	}
	if ($aksi == "ubah") {
		include "page/Data Outlet/ubah.php";
	}
	if ($aksi == "hapus") {
		include "page/Data Outlet/hapus.php";
	}
}
if ($page == "Data Pengguna") {
	if ($aksi == "") {
		include "page/Data Pengguna/pengguna.php";
	}
	if ($aksi == "tambah") {
		include "page/Data Pengguna/tambah.php";
	}
	if ($aksi == "ubah") {
		include "page/Data Pengguna/ubah.php";
	}
	if ($aksi == "hapus") {
		include "page/Data Pengguna/hapus.php";
	}
}
if ($page == "Data Profile") {
	include "page/profile.php";
}
if ($page == "Transaksi Laundry") {
	if ($aksi == "") {
		include "page/Transaksi Laundry/laundry.php";
	}
	if ($aksi == "tambah") {
		include "page/Transaksi Laundry/tambah.php";
	}
	if ($aksi == "ubah") {
		include "page/Transaksi Laundry/ubah.php";
	}
	if ($aksi == "hapus") {
		include "page/Transaksi Laundry/hapus.php";
	}
	if ($aksi == "lunas") {
		include "page/Transaksi Laundry/lunas.php";
	}
}
if ($page == "Data Transaksi") {
	if ($aksi == "") {
		include "page/Data Transaksi/transaksi.php";
	}
	if ($aksi == "tambah") {
		include "page/Data Transaksi/tambah.php";
	}
	if ($aksi == "ubah") {
		include "page/Data Transaksi/ubah.php";
	}
	if ($aksi == "hapus") {
		include "page/Data Transaksi/hapus.php";
	}
	if ($aksi == "lunas") {
		include "page/Data Transaksi/lunas.php";
	}
}

if ($page == "Dashboard") {
	include "page/dashboard.php";
}
