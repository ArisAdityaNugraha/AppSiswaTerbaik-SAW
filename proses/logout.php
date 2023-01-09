<?php
session_start();
require_once"../koneksi.php";

session_destroy();
header("location:../index.php");
 
// unset($_SESSION['username']);
// echo "<script>window.location='index.php'</script>";

