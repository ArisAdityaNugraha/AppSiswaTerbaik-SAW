<?php
session_start();
include '../koneksi.php';
$username=$_POST['username'];   //tangkap data yg di input dari form login input username
$password=$_POST['password'];   //tangkap data yg di input dari form login input password

$query=mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");   //melakukan pengampilan data dari database untuk di cocokkan
$xxx=mysqli_num_rows($query);     //melakukan pencocokan
if($xxx==TRUE){         // melakukan pemeriksaan kecocokan dengan percabangan.
    $_SESSION['username']=$username;  //jika cocok, buat session dengan nama sesuai dengan username
    header("location:../home.php");     // dan alihkan ke index.php
}else{               //jika tidak tampilkan pesan gagal login
    echo "<script>alert('Gagal Login');window.location='../index.php';</script>";
    echo "gagal login";
    
}

?>