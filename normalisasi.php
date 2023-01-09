<?php
session_start();

require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}

	//Cari Max atau min dari tiap kolom Matrik
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
?>

<html>
<head>
	<title>NORMALISASI</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"> 
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	<style type="text/css">
		table, tr, td{
			font-size: 12px;
		}
	</style>
</head>
<body>

	<?php include'templates/header.php'; ?>

			<h1>Matrik Normalisasi</h1>
			<table id='example' class='display' cellspacing='0' width='100%'>
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
					</tr>
				</thead>

				<?php
				$no = 1;
				//Hitung Normalisasi tiap Elemen
				$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_matrik WHERE status='0'");	
				while($dt2 = mysqli_fetch_array($sql2)): ?>
					<tr>
						<td align='center'><?= $no++; ?>.</td>
						<td><?= getNama($dt2['nik']); ?></td>
						<td align='center'><?= getKelas($dt2['nik']); ?></td>
						<td align="center"><?= getTh_ajaran($dt2['nik']); ?></td>
						<td align='center'><?= round($max['minK1']/$dt2['kriteria1_absensi'], 5); ?></td>
						<td align='center'><?= round($dt2['kriteria2_extrakulikuler']/$max['maxK2'], 5); ?></td>
						<td align='center'><?= round($dt2['kriteria3_mapel']/$max['maxK3'], 5); ?></td>
						<td align='center'><?= round($dt2['kriteria4_perilaku']/$max['maxK4'], 5); ?></td>
					</tr>

				<?php
				endwhile; 
				?>

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