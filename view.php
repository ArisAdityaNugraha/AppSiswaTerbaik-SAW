<?php
session_start();

require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}
?>

<html>
<head>
	<title>Melihat Data Santri</title>
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
		
				<h1> Daftar Nama Santri </h1>
				<table id='example' class='display' cellspacing='0' width='100%'>
					<thead>
						<tr>
							<td>No.</td>
							<td>NIS</td>
							<td>Nama</td>
							<td>Kelas</td>
							<td>Th. Ajaran</td>
							<td>Bobot Absensi</td>
							<td>Bobot Extrakulikuler</td>
							<td>Bobot Rata - rata Mapel</td>
							<td>Bobot Perilaku</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<?php
					$query = mysqli_query($koneksi, "SELECT * FROM tbl_santri, tbl_matrik WHERE tbl_matrik.nik=tbl_santri.nik AND tbl_matrik.status='0' AND tbl_santri.status='0' ORDER BY tbl_matrik.nik ASC") or die(mysqli_error($koneksi));
				
						$no = 1;
						while($data = mysqli_fetch_assoc($query)){ ?>
							
						<tr>
							<td align="center"><?= $no++; ?>.</td>
							<td><?= $data['nis']; ?></td>
							<td><?= $data['nama']; ?></td>
							<td align="center"><?= $data['kelas']; ?></td>
							<td align="center"><?= $data['th_ajaran']; ?></td>
							<td align="center"><?= $data['kriteria1_absensi']; ?></td>
							<td align="center"><?= $data['kriteria2_extrakulikuler']; ?></td>
							<td align="center"><?= $data['kriteria3_mapel']; ?></td>
							<td align="center"><?= $data['kriteria4_perilaku']; ?></td>
							<td>
								<a href="edit.php?nik=<?= $data['nik']; ?>">Edit</a> | 
								<a href="proses/hapus.php?nik=<?= $data['nik']; ?>" onclick="return confirm('Yakin akan menghapus data?')">Hapus</a> 
							</td>
						</tr>
						
						<?php	
						}
					?>
				</table>

		</div>
	</div>

	<script>
	    $(document).ready(function() {
		   $('#example').DataTable();
		} );
	</script>
</body>
</html>