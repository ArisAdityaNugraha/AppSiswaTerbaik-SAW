<?php 
	include '../koneksi.php';
	$nik = $_GET['nik'];
	mysqli_query($koneksi, "DELETE FROM tbl_matrik WHERE nik='$nik'")or die(mysqli_error($koneksi));
	mysqli_query($koneksi, "DELETE FROM tbl_santri WHERE nik='$nik'")or die(mysqli_error($koneksi));

	echo "<script>alert('Data berhasil dihapus');window.location='../view.php';</script>";
