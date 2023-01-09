<?php
session_start();
require_once"koneksi.php";
if(!isset($_SESSION['username'])){
    echo "<script>window.location='index.php'</script>";
}
?>

<html>
<title>Home</title>
<style type="text/css">
<!--
.style2 {font-size: 24px}
-->
</style>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"> 
</head>

<body>
  <?php include'templates/header.php'; ?>

      <h2>Selamat Datang <mark> <?= $_SESSION['username']; ?> </mark>... | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
      </h2>
      <img src="images/headernew.jpg" width="500px" align="right">

    </div>
  </div>
</body>
</html>