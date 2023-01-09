<?php
session_start();

require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}

	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$nik = $_GET['nik'];
	
	//melakukan query ke database dg SELECT table santri dengan kondisi WHERE santri_id = '$id'
	$show = mysqli_query($koneksi, "SELECT * FROM tbl_santri, tbl_matrik WHERE tbl_matrik.nik=tbl_santri.nik AND tbl_matrik.nik='$nik'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysqli_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysqli_fetch_assoc($show);
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Santri</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"> 
</head>
<body>

	<div id="content" align="center">
    <div class="body">
      <div class="header">
        <img src="images/headernew.jpg">
      </div>

			<h1 class="style3"> Masukkan Data Santri </h1>
			
			<h3>Edit Data Santri</h3>
			
			<form action="proses/edit-proses.php" method="post">
				<table cellpadding="3" cellspacing="0">
					<input type="hidden" name="nik" value="<?= $data['nik']; ?>">
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" required></td>
					</tr>
					<tr>
						<td>Nama Santri</td>
						<td>:</td>
						<td><input type="text" name="nama1" size="30" value="<?php echo $data['nama']; ?>" required></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td><input type="text" name="kelas" size="30" value="<?php echo $data['kelas']; ?>" required></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><input type="text" name="alamat1" size="30" value="<?php echo $data['alamat']; ?>" required></td>
					</tr>
					<tr>
						<td>Absensi Kelas</td>
						<td>:</td>
						<td>
							<select name="kriteria1_absensi" required>
		           	<?php 
		           		if($data['kriteria1_absensi'] == "5") echo "<option value='5' selected> Sangat Baik (86-100)</option>";
		           		else echo "<option value='5'>Sangat Baik (86-100)</option>";

		           		if($data['kriteria1_absensi'] == "4") echo "<option value='4' selected> Baik (76-85.9)</option>";
		           		else echo "<option value='4'>Baik (76-85.9)</option>";

		           		if($data['kriteria1_absensi'] == "3") echo "<option value='5' selected> Cukup (66-75.9)</option>";
		           		else echo "<option value='3'>Cukup (66-75.9)</option>";

		           		if($data['kriteria1_absensi'] == "2") echo "<option value='5' selected> Kurang (56-65.9)</option>";
		           		else echo "<option value='2'>Kurang (56-65.9)</option>";

		           		if($data['kriteria1_absensi'] == "1") echo "<option value='5' selected> Sangat Kurang (<= 55)</option>";
		           		else echo "<option value='1'>Sangat Kurang (<= 55)</option>";
		         		?>
							</select>
						</td>
					</tr>

					<tr>
						<td>Extra Kulikuler</td>
						<td>:</td>
						<td>
							<select name="kriteria2_extrakulikuler" required>
								<?php 
				       		if($data['kriteria2_extrakulikuler'] == "5") echo "<option value='5' selected> A (Sangat Baik) </option>";
				       		else echo "<option value='5'>A (Sangat Baik) </option>";

				       		if($data['kriteria2_extrakulikuler'] == "4") echo "<option value='4' selected> B (Baik)  </option>";
				       		else echo "<option value='4'>B (Baik)</option>";

				       		if($data['kriteria2_extrakulikuler'] == "3") echo "<option value='3' selected> C (Cukup) </option>";
				       		else echo "<option value='3'>C (Cukup)</option>";

				       		if($data['kriteria2_extrakulikuler'] == "2") echo "<option value='2' selected> D (Kurang) </option>";
				       		else echo "<option value='2'>D (Kurang)</option>";

				       		if($data['kriteria2_extrakulikuler'] == "1") echo "<option value='1' selected> E (Sangat Kurang) </option>";
				       		else echo "<option value='1'>E (Sangat Kurang)</option>";
						   		?>
							</select>
						</td>
					</tr>

				  	<tr>
						<td>Nilai Mapel</td>
						<td>:</td>
						<td>
							<select name="kriteria3_mapel" required>
		           	<?php 
		           		if($data['kriteria3_mapel'] == "5") echo "<option value='5' selected> Sangat Baik (86-100)</option>";
		           		else echo "<option value='5'>Sangat Baik (86-100)</option>";

		           		if($data['kriteria3_mapel'] == "4") echo "<option value='4' selected> Baik (76-85.9)</option>";
		           		else echo "<option value='4'>Baik (76-85.9)</option>";

		           		if($data['kriteria3_mapel'] == "3") echo "<option value='5' selected> Cukup (66-75.9)</option>";
		           		else echo "<option value='3'>Cukup (66-75.9)</option>";

		           		if($data['kriteria3_mapel'] == "2") echo "<option value='5' selected> Kurang (56-65.9)</option>";
		           		else echo "<option value='2'>Kurang (56-65.9)</option>";

		           		if($data['kriteria3_mapel'] == "1") echo "<option value='5' selected> Sangat Kurang (<= 55)</option>";
		           		else echo "<option value='1'>Sangat Kurang (<= 55)</option>";
		         		?>
							</select>
						</td>
					</tr>

					<tr>
						<td>Perilaku</td>
						<td>:</td>
						<td>
							<select name="kriteria4_perilaku" required>
		           	<?php 
		           		if($data['kriteria4_perilaku'] == "5") echo "<option value='5' selected> Sangat Baik (86-100)</option>";
		           		else echo "<option value='5'>Sangat Baik (86-100)</option>";

		           		if($data['kriteria4_perilaku'] == "4") echo "<option value='4' selected> Baik (76-85.9)</option>";
		           		else echo "<option value='4'>Baik (76-85.9)</option>";

		           		if($data['kriteria4_perilaku'] == "3") echo "<option value='5' selected> Cukup (66-75.9)</option>";
		           		else echo "<option value='3'>Cukup (66-75.9)</option>";

		           		if($data['kriteria4_perilaku'] == "2") echo "<option value='5' selected> Kurang (56-65.9)</option>";
		           		else echo "<option value='2'>Kurang (56-65.9)</option>";

		           		if($data['kriteria4_perilaku'] == "1") echo "<option value='5' selected> Sangat Kurang (<= 55)</option>";
		           		else echo "<option value='1'>Sangat Kurang (<= 55)</option>";
		         		?>
							</select>
						</td>
					</tr>

					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td>
							<input type="submit" name="simpan" value="Simpan">
							<button><a href="view.php" style="text-decoration-line: none;">Kembali</a></button>
						</td>
					</tr>
				</table>
				<hr>
			</form>
		</div>
	</div>
</body>
</html>