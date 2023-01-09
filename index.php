<?php
session_start();
require_once"koneksi.php";

if(isset($_SESSION['username'])){
    echo "<script>window.location='home.php'</script>";
}
else{
?>

<html>
<head>
    <title>Login Administrator</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">     
</head>
<body>
  <div id="kotak">
    <div id="atas">LOGIN ADMINISTRATOR</div>
    <br><center><p>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></p></center>
    
    <div id="bawah">
 
      <form method="post" action="proses/login-proses.php">
        <input class="masuk" type="text" autocomplete="off" placeholder="Username .." name="username"><br/>
        <input class="masuk" type="password" autocomplete="off" placeholder="Password .." name="password"><br/>
        <input id="tombol" type="submit" name="login" value="Login">
      </form>
 
    </div>
  </div>
</body>

</html>

<?php } ?>