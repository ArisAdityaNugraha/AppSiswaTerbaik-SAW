<?php
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['Submit'])){
	
	include('../koneksi.php');
	
	//jika tombol tambah di klik maka lanjut prosesnya
	$nik1 = $_POST['nik1'];
	$nis = $nik1;
	$nama1 = $_POST['nama1'];
	$kelas=$_POST['kelas'];
	$th_ajaran=$_POST['th_ajaran'];
	$alamat1=$_POST['alamat1'];
	$kriteria1_absensi=$_POST['kriteria1_absensi'];
	$kriteria2_extrakulikuler=$_POST['kriteria2_extrakulikuler'];
	$kriteria3_mapel=$_POST['kriteria3_mapel'];
	$kriteria4_perilaku=$_POST['kriteria4_perilaku'];

	// cek duplikasi nis
	$sql_cek_nis = mysqli_query($koneksi, "SELECT * FROM tbl_santri WHERE status='0' AND nis='$nik1'") or die(mysqli_error($koneksi));
	// jika nis sudah ada
	if(mysqli_num_rows($sql_cek_nis) > 0){
		echo "<script>alert('Nis sudah pernah diinput!');window.location='../input.php';</script>";
	}
	else{
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input1 = mysqli_query($koneksi, "INSERT INTO tbl_matrik VALUES(NULL, '$nik1','$kriteria1_absensi','$kriteria2_extrakulikuler','$kriteria3_mapel', '$kriteria4_perilaku', '')")or die(mysqli_error($koneksi));
		$input = mysqli_query($koneksi, "INSERT INTO tbl_santri VALUES(NULL, '$nik1', '$nis', '$nama1', '$kelas', '$th_ajaran', '$alamat1', '')") or die(mysqli_error($koneksi));
		//jika query input sukses
		if($input && $input1){
			echo "<script>alert('Data berhasil ditambahkan');window.location='../view.php';</script>";
			
		}
		else{
			echo "<script>alert('Gagal menambahkan data!');window.location='../input.php';</script>";
		}
	}
	

}
else{

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>