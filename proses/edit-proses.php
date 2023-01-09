<?php

include('../koneksi.php');

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	$nik=$_POST['nik'];
	$nis=$_POST['nis'];
	$nama1=$_POST['nama1'];
	$kelas=$_POST['kelas'];
	$alamat1=$_POST['alamat1'];
	$kriteria1_absensi=$_POST['kriteria1_absensi'];
	$kriteria2_extrakulikuler=$_POST['kriteria2_extrakulikuler'];
	$kriteria3_mapel=$_POST['kriteria3_mapel'];
	$kriteria4_perilaku=$_POST['kriteria4_perilaku'];

	// cek duplikasi nis
	$sql_cek_nis = mysqli_query($koneksi, "SELECT * FROM tbl_santri WHERE status='0' AND nis='$nis' AND nik!='$nik'") or die(mysqli_error($koneksi));
	// jika identitas sudah ada
	if(mysqli_num_rows($sql_cek_nis) > 0){
		echo "<script>alert('Nis sudah pernah diinput!');window.location='../edit.php?nik=$nik';</script>";
	}
	else{
		$update = mysqli_query($koneksi, "UPDATE tbl_matrik SET kriteria1_absensi='$kriteria1_absensi', kriteria2_extrakulikuler='$kriteria2_extrakulikuler', kriteria3_mapel='$kriteria3_mapel', kriteria4_perilaku='$kriteria4_perilaku' WHERE nik='$nik'") or die(mysqli_error($koneksi));

		$update1 = mysqli_query($koneksi, "UPDATE tbl_santri SET nis='$nis', nama='$nama1', kelas='$kelas', alamat='$alamat1' WHERE nik='$nik'") or die(mysqli_error($koneksi));
		
		//jika query update sukses
		if($update && $update1){
			echo "<script>alert('Data berhasil diupdate');window.location='../view.php';</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data');window.location='../edit.php?nik=$nik';</script>";
			
		}
	}
	

}else{

	echo '<script>window.history.back()</script>';

}
?>