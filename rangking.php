<?php
session_start();
require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}

$bobot = array(0.2, 0.1, 0.45, 0.25);
	$crMax = mysqli_query($koneksi, "SELECT 
		min(kriteria1_absensi) as minK1, 
		max(kriteria2_extrakulikuler) as maxK2,
		max(kriteria3_mapel) as maxK3,
		max(kriteria4_perilaku) as maxK4
		FROM tbl_matrik WHERE status='0'");
	$max = mysqli_fetch_array($crMax);
	//Buat fungsi tampilkan nama
	function getNama($id){
		include("koneksi.php");
		$q =mysqli_query($koneksi, "SELECT * FROm tbl_santri where nik='$id' AND status='0'");
		$d = mysqli_fetch_array($q);
		return $d['nama'];
	}

	function getKelas($id){
		include("koneksi.php");
		$k =mysqli_query($koneksi, "SELECT * FROm tbl_santri where nik='$id' AND status='0'");
		$kls = mysqli_fetch_array($k);
		return $kls['kelas'];
	}

	function getTh_ajaran($id){
		include("koneksi.php");
		$l =mysqli_query($koneksi, "SELECT * FROm tbl_santri where nik='$id' AND status='0'");
		$th = mysqli_fetch_array($l);
		return $th['th_ajaran'];
	}

	//Proses perangkingan dengan rumus langkah 3
	$sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_matrik WHERE status='0'");


?>

<html>
<head>
	<title>RANGKING</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"> 
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<style type="text/css">
		body{
			max-height: 2000px;
		}

		table, tr, td{
			font-size: 12px;
		}
	</style>
</head>

<body>

	<?php include'templates/header.php'; ?>
			 
				<h1> HASIL PERANGKINGAN PRESTASI SANTRI</h1>

				<form action="proses/proses-arsip.php" method="post" style="margin-left: 5px; float: left;">
					<input type="submit" name="arsip" value="Arsipkan">
				</form>
				<form action="cetak/export-excel.php" method="post" style="display: inline; margin-left: 5px; float: left;">
					<input type="submit" name="submit" value="EXPORT EXCEL">
				</form>
				<form target="_blank" action="cetak/cetak.php" method="post" style="display: inline; margin-left: 5px; float: left;">
					<input type="submit" name="submit" value="Print PDF">
				</form>

				<table id='example' class='display' cellspacing='0' width='100%' style="margin: 4px">
					<thead>
						<tr align='center'>
							<td>No</td>
							<td>Nama</td>
							<td>Kelas</td>
							<td>Th. Ajaran</td>
							<td>Absensi Kelas</td>
							<td>Nilai Extra Kulikuler</td>
							<td>Nilai Mapel</td>
							<td>Perilaku</td>
							<td>Total</td>
						</tr>
					</thead>
			
					<?php
					$no = 1;
					//Kita gunakan rumus (Normalisasi x bobot)
					while ($dt3 = mysqli_fetch_array($sql3)):
						$nilai1 = ($max['minK1']/$dt3['kriteria1_absensi'])*$bobot[0];
						$nilai2 = ($dt3['kriteria2_extrakulikuler']/$max['maxK2'])*$bobot[1];
						$nilai3 = ($dt3['kriteria3_mapel']/$max['maxK3'])*$bobot[2];
						$nilai4 = ($dt3['kriteria4_perilaku']/$max['maxK4'])*$bobot[3];

						$rangking = round(($nilai1 + $nilai2 + $nilai3 + $nilai4), 3);
						
						?>

						<tr>
							<td align='center'> <?= $no++ ?>. </td>
							<td> <?= getNama($dt3['nik']); ?> </td>
							<td align='center'> <?= getKelas($dt3['nik']); ?> </td>
							<td align='center'> <?= getTh_ajaran($dt3['nik']); ?> </td>
							<td align='center'> <?= round($nilai1, 5); ?> </td>
							<td align='center'> <?= $nilai2; ?> </td>
							<td align='center'> <?= round($nilai3, 5); ?> </td>
							<td align='center'> <?= $nilai4; ?> </td>
							<td align='center'> <?= $rangking; ?> </td>
						</tr>

					<?php endwhile; ?>
					
				</table>	

			</div>
		</div>
	</div>

<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );
</script>

</body>
</html>