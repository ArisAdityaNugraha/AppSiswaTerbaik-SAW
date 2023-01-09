<?php
session_start();

require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}
?>

<html>
<head>
  <title>Memasukkan Data Santri</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"> 
</head>
<body>
  
  <?php include'templates/header.php'; ?>

      <h1 class="style3"> Input Data Santri </h1>
      <br><br>
      <form method="post" action="proses/input-proses.php">
        <table width="550" border="0">
          <tr>
            <td width="200">NIS</td>
            <td width="10">:</td>
            <td width="300"><input name="nik1" type="text" size="25" maxlength="50" required></td>
          </tr>
          <tr>
            <td>Nama Santri</td>
            <td>:</td>
            <td><input name="nama1" type="text" size="25" maxlength="50" required></td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input name="kelas" type="text" size="25" maxlength="50" required></td>
          </tr>
          <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><input name="th_ajaran" type="text" size="25" maxlength="50" required></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input name="alamat1" type="text" size="25" maxlength="50" required></td>
          </tr>

          <tr>
            <td>Absensi Kelas(Ketidakhadiran)</td>
            <td>:</td>
            <td><input name="kriteria1_absensi" type="text" size="25" maxlength="50" required></td>
          </tr>

          <tr>
            <td>Nilai Extra Kulikuler</td>
            <td>:</td>
            <td>
              <select name="kriteria2_extrakulikuler" required>
              	<option value="">Pilih nilai extrakulukuler</option>
              	<option value="5">A (Sangat Baik)</option>
                <option value="4">B (Baik)</option>
                <option value="3">C (Cukup)</option>
                <option value="2">D (Kurang)</option>
                <option value="1">E (Sangant Kurang)</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>Nilai Mapel</td>
            <td>:</td>
            <td><input name="kriteria3_mapel" type="text" size="25" maxlength="50" required></td>
          </tr>

          <tr>
            <td>Perilaku</td>
            <td>:</td>
            <td>
              <select name="kriteria4_perilaku" required="">
                <option value="">Pilih Perilaku</option>
                <option value="5">Sangat Baik (86-100)</option>
                <option value="4">Baik (76-85.9)</option>
                <option value="3">Cukup (66-75.9)</option>
                <option value="2">Kurang (56-65.9)</option>
                <option value="1">Sangat Kurang (<= 55)</option>
               </select>
            </td>
          </tr>

          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input name="Submit" type="submit" value="Tambah"></td>
          </tr>
        </table>
        <hr>
      </form>
    </div>
  </div>

</body>
</html>