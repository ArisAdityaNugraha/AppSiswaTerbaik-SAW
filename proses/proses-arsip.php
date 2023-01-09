<?php

session_start();
require_once"../koneksi.php";

if(isset($_POST['arsip'])){

	$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_matrik, tbl_santri WHERE tbl_santri.status='0' AND tbl_matrik.status='0'") or die(mysqli_error($koneksi));
	if(mysqli_num_rows($query2) == 0){
		echo "<script>alert('Tidak ada data yang diarsipkan!');window.location='../rangking.php';</script>";
		die();
	}

	$query = mysqli_query($koneksi, "UPDATE tbl_matrik, tbl_santri SET tbl_santri.status='1', tbl_matrik.status='1'") or die(mysqli_error($koneksi));
	if($query){
		echo "<script>alert('Data berhasil diarsipkan');window.location='../arsip.php';</script>";
	}
	else{
		echo "<script>alert('Gagal mengarsipkan data');window.location='../rangking.php';</script>";
	}
}
